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

namespace Gravstrap\Bootstrap\Modal;

use Gravstrap\Base\BaseShortcode;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Gravstrap\Base\RegisteredShortcodes;

/**
 * Class Modal handles a bootstrap modal component
 *
 * @author Giansimon Diblas
 */
class Modal extends BaseShortcode
{
    /**
     * {@inheritdoc}
     */
    public function shortcode()
    {
        return 'bootstrap-modal';
    }

    /**
     * {@inheritdoc}
     */
    protected function template()
    {
        return 'bootstrap/modal.html.twig';
    }
    
    /**
     * {@inheritdoc}
     */
    protected function renderOutput(ShortcodeInterface $shortcode)
    {
        return $this->grav['twig']->processTemplate($this->template(), [
            'id' => $shortcode->getParameter('id'),
            'title' => $shortcode->getParameter('title'),
            'attributes' => $this->parseAttributes($shortcode->getParameter('attributes')),
            'close_button_attributes' => $this->parseAttributes($shortcode->getParameter('close_button_attributes')),
            'buttons' => RegisteredShortcodes::get($this->getShortcodeHash($shortcode)),
            'content' => $this->fixContent($shortcode),
        ]);
    }
}