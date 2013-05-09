<?php

/*
 * This file is part of the Symfony CS utility.
*
* (c) Fabien Potencier <fabien@symfony.com>
*
* This source file is subject to the MIT license that is bundled
* with this source code in the file LICENSE.
*/

namespace ROFixer\CS\Fixer;

use Symfony\CS\FixerInterface;

/**
 * @author Ramon Henrique Ornelas <ramon.ornela@gmail.com>
 */
class ConstantsLowerFixer implements FixerInterface
{
    public function fix(\SplFileInfo $file, $content)
    {
        if (!preg_match('/[\"\'].*(TRUE|FALSE|NULL).*[\"\']/s', $content)) {
            return preg_replace('/\b(TRUE|FALSE|NULL)\b/e', "strtolower('$1')", $content);
        }

        return $content;
    }

    public function getLevel()
    {
        return FixerInterface::PSR2_LEVEL;
    }

    public function getPriority()
    {
        return 100;
    }

    public function supports(\SplFileInfo $file)
    {
        return true;
    }

    public function getName()
    {
        return 'constants_lower';
    }

    public function getDescription()
    {
        return '';
    }
}
