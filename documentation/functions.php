<?php 

function getSections()
{
	$sections_json_file = dirname(__FILE__) . '/sections.json';
	if (file_exists($sections_json_file)) {
		$sections_string = file_get_contents($sections_json_file);
		return json_decode($sections_string, true);
	} else {
		die('Sections.json file not found');
	}
}

function getArticles($current_section)
{	
	return $current_section['articles'];
}

/**
 * Generates navigation markup
 * @param  [array] $sections [Sections data array]
 * @param  [string] $lang    [Current language key]
 * @return [string]          [Navigation markup string]
 */
function generateNavigation($sections, $lang, $section_param)
{		
	$html = '';
	
	foreach ($sections as $section_key => $section_dirname) {
		$section_json_file	= dirname(__FILE__) . '/sections/' . $section_dirname . '/section.json';
		// Check if section json file exists
		if (file_exists($section_json_file)):
			$section_string 	= file_get_contents($section_json_file);
			$current_section 	= json_decode($section_string, true);

			if (empty($current_section)) {
				echo "<i>Section $section_dirname JSON empty or formatted wrong</i>";
			}

			$section_id 		= $current_section['id'];
			$section_title 		= $current_section['translations'][$lang];
			$section_path 		= 'index.php?lang=' . $lang . '&section=' . $section_id;

			// Active class
			$active_class = '';			
			if ($section_id == $_GET['section']) {
				$active_class = ' opened';
			}

			// Get Articles List
			$section_articles 	= getArticles($current_section);

			$html .= '<li class="section section__' . $section_id . '"><a class="section_link' . $active_class .'" href="' . $section_path .'" data-key="' . $section_key . '"  data-id="' . $section_id . '">' . $section_title . '</a>';

				// Generate articles navigation
				if (!empty($section_articles)) {
					$html .= '<ul>';					
					foreach ($section_articles as $key => $article) {
						$article_id 	= $article['id'];
						$article_name 	= $article['translations'][$lang];

						$article_path	= '#' . $article_id;
                        // Update article path if first in article section
                        if ($key == 0) {
                            $article_path = 'index.php?lang=' . $lang . '&section=' . $section_id .'#';
                        }
                        // Update article path if not in article section
                        else if ($section_param != $section_id) {
							$article_path = 'index.php?lang=' . $lang . '&section=' . $section_id . '#' . $article_id;
						}
						$html .= '<li class="article article__' . $article_id . '"><a class="article_link" href="' . $article_path . '" data-sectionId="' . $section_key . '" data-id="' . $article_id . '" data-section="' . $section_id . '">' . $article_name . '</a></li>';
					}
					$html .= '</ul>';
				}
			$html .= '</li>';
		else:
			die("Section $section_dirname JSON file not found");
		endif;

	}
	return $html;
}

/**
 * Includes articles files
 * @param  [array] $sections      	[Array with sections data]
 * @param  [string] $lang          	[Current language]
 * @param  [string] $section_param 	[Current section]
 */
function includeSection($sections, $lang, $section_param)
{
	$section_json_file	= dirname(__FILE__) . '/sections/' . $section_param . '/section.json';

	if (file_exists($section_json_file)):
		$section_string 	= file_get_contents($section_json_file);
		$current_section 	= json_decode($section_string, true);		

		$section_id 		= $current_section['id'];
		$section_articles 	= $current_section['articles'];

		echo "<section id='" . $section_id . "'>";
			// Load section description
			$section_desc = dirname(__FILE__) . '/sections/' . $section_param . '/' . $lang . '/__description.php';
			if (file_exists($section_desc)) {
				echo "<article class='description'>";
					include_once $section_desc;
				echo "</article>";
			} else {
				echo "<i>Section __description.php file is missing.</i>";
			}			

			foreach ($section_articles as $key => $article) {
				$article_id = $article['id'];
				echo "<article id='" . $article_id . "'>";
					$article_path = dirname(__FILE__) . '/sections/' . $section_param . '/' . $lang . '/' . $article_id . '.php';
					if (file_exists($article_path)) {
						include_once $article_path;
					} else {
						echo "<i>Article $article_id not found.</i>";
					}			
				echo "</article>";
			}
		echo "</section>";
	else:
		die("Section $section_dirname JSON file not found");
	endif;	
}

/**
 * Documentation Search
 * @param  string $dir 	Documentation sections directory
 * @return array 		Array with files, that contain search request value
 */
function search_dir($dir)
{
	global $request, $seen;

	$dirs = array();
	$pages = array();

	$regex = "/" . preg_quote($request,'/') . "/";
	$seen[] = realpath($dir);

	if (is_readable($dir) && ($d = dir($dir))) {

		while (false != ($f = $d->read())) {
			$path = $d->path . '/' . $f;

			if (is_file($path) && is_readable($path)) {
				$realpath = realpath($path);

				if (in_array($realpath, $seen)) {
					continue;
				} else {
					$seen[] = $realpath;
				}

				$file = join(' ', file($path));

				if (preg_match($regex, $file)) {
					if ('json' != substr($path, strrpos($path, '.') + 1 )) {
						$path_array = explode('/', $path);
						$sect_name = substr($path_array[3], 0, strpos($path_array[3], '.'));

						if ($sect_name == '__description') {
							$sect_hash = '';
						} else {
							$sect_hash = '#' . $sect_name;
						}

						array_push($pages, array(
							'lang' => $path_array[2],
							'section' => $path_array[1],
							'hash' => $sect_hash,
							)
						);
					}					
				}

			} else {
				if (is_dir($path) && ('.' != $f) && ('..' != $f)) {
					array_push($dirs, $path);
				}
			}
		}
		$d->close();
	}

	foreach ($dirs as $subdir) {
		$realdir = realpath($subdir);

		if (!in_array($realdir, $seen)) {
			$seen[] = $realdir;
			$pages = array_merge($pages, search_dir($subdir));
		}
	}

	return $pages;
}