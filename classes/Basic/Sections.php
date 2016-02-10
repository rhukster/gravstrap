<?php
/**
 * This file is part of the Gravstrap plugin and it is distributed
 * under the MIT License. To use this application you must leave
 * intact this copyright notice.
 *
 * Copyright (c) Giansimon Diblas <info@diblas.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://diblas.net
 *
 * @license    MIT License
 *
 */

namespace Gravstrap\Basic;

use Gravstrap\Base\BaseSectionShortcode;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

/**
 * Class Sections handles a generic array of markdown sections, callable in a template by name.
 * 
 * This shortcode is not directly renderable.
 *
 * @author Giansimon Diblas
 */
class Sections extends BaseSectionShortcode
{
    /**
     * {@inheritdoc}
     */
    public function shortcode()
    {
        return 'sections';
    }

    /**
     * {@inheritdoc}
     */
    protected function template()
    {
        return '';
    }
    
    /**
     * {@inheritdoc}
     */
    protected function renderOutput(ShortcodeInterface $shortcode)
    {
        return "";
    }
    
    /**
     * {@inheritdoc}
     */
    public function processShortcode(ShortcodeInterface $shortcode)
    {
        $variableName = 'sections' . $this->grav['page']->folder();
        $sections = $this->sections($shortcode);
        $this->grav['twig']->twig_vars[$variableName] = $sections;
        
        $value = array(
            $variableName => array(
                "output" => $sections,
                'assets' => array(),
            ),
        );
        $this->saveToCache($value);
        
        return "";
    }
}