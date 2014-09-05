<?php
/**
 * name: Tim Thumb
 * description: Enable usage of Tim Thumb image-resize script
 * version: 0.2
 * folder: tim_thumb
 * class: TimThumb
 * type: image_resize
 * hooks: theme_index_top
 * author: Nick Ramsay
 * authorurl: http://hotarucms.org/blog.php?u=1
 *
 * PHP version 5
 *
 * Copyright (c)  <Nick Ramsay>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * You can review a copy of the MIT License details at
 * http://www.opensource.org/licenses/mit-license.php
 *
 * @category  Content Management System
 * @package   HotaruCMS
 * @author    Nick Ramsay 
 * @copyright Copyright (c) 2010, Nick Ramsay
 * @license   Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
 * @link      http://www.hotarucms.org/
 */

class TimThumb
{
	/**
	 * Define TIM_THUMB constant
	 */
	public function theme_index_top($h)
	{
		if (!defined("TIM_THUMB")) {
			define("TIM_THUMB", BASEURL . 'content/plugins/tim_thumb/libs/timthumb.php?src=' . BASEURL . 'content/');
		}
	}
}
?>