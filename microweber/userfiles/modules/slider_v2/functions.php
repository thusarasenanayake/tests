<?php
function getCssForSlide($slide)
{
        $imageBackgroundFilter = 'inherit';
        $imageBackgroundColor = 'inherit';
        $descriptionColor = 'inherit';
        $titleColor = 'inherit';
        $buttonFontSize = '18px';
        $descriptionFontSize = '18px';
        $titleFontSize = '36px';
        $imageBackgroundOpacity = 'inherit';
        if (isset($slide['imageBackgroundFilter'])) {
            $imageBackgroundFilter = $slide['imageBackgroundFilter'];
        }
        if (isset($slide['imageBackgroundColor'])) {
            $imageBackgroundColor = $slide['imageBackgroundColor'];
        }
        if (isset($slide['descriptionColor'])) {
            $descriptionColor = $slide['descriptionColor'];
        }
        if (isset($slide['descriptionFontSize'])) {
            $descriptionFontSize = $slide['descriptionFontSize'] . 'px';
        }
        if (isset($slide['titleColor'])) {
            $titleColor = $slide['titleColor'];
        }
        if (isset($slide['titleFontSize'])) {
            $titleFontSize = $slide['titleFontSize'] . 'px';
        }
        if (isset($slide['buttonFontSize'])) {
            $buttonFontSize = $slide['buttonFontSize'] . 'px';
        }
        if (isset($slide['imageBackgroundOpacity'])) {
            $imageBackgroundOpacity = $slide['imageBackgroundOpacity'];
        }

        return '

    <style>
        .js-slide-title-'.$slide['itemId'].' {
            color: '.$titleColor.' !important;
            font-size: '.$titleFontSize.' !important;
        }
        .js-slide-description-'.$slide['itemId'].' {
            color: '.$descriptionColor.' !important;
            font-size: '.$descriptionFontSize.' !important;
        }
        .js-slide-button-'.$slide['itemId'].' {
            color: '.$descriptionColor.' !important;
            font-size: '.$buttonFontSize.' !important;
        }
        .js-slide-image-'.$slide['itemId'].' {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: -1;
          '.getCssRulesByFilter($imageBackgroundFilter).'
        }
         .js-slide-image-'.$slide['itemId'].'::after {
            content: "";
            left: 0;
            background: '.$imageBackgroundColor.';
            opacity: 0.'.$imageBackgroundOpacity.';
            width: 100%;
            height: 100%;
            position: absolute;

        }
    </style> ';

}

function getCssRulesByFilter($filter)
{
    if ($filter == 'blur') {
        return '-webkit-filter: blur(5px); filter: blur(5px);';
    }
    if ($filter == 'mediumBlur') {
        return '-webkit-filter: blur(10px); filter: blur(10px);';
    }
    if ($filter == 'maxBlur') {
        return '-webkit-filter: blur(15px); filter: blur(15px);';
    }
    if ($filter == 'grayscale') {
        return '-webkit-filter: grayscale(100%); filter: grayscale(100%);';
    }
    if ($filter == 'sepia') {
        return '-webkit-filter: sepia(100%); filter: sepia(100%);';
    }
    if ($filter == 'invert') {
        return '-webkit-filter: invert(100%); filter: invert(100%);';
    }
    if ($filter == 'opacity') {
        return '-webkit-filter: opacity(50%); filter: opacity(50%);';
    }
    if ($filter == 'brightness') {
        return '-webkit-filter: brightness(50%); filter: brightness(50%);';
    }
    if ($filter == 'contrast') {
        return '-webkit-filter: contrast(50%); filter: contrast(50%);';
    }
    if ($filter == 'hue-rotate') {
        return '-webkit-filter: hue-rotate(90deg); filter: hue-rotate(90deg);';
    }
    if ($filter == 'saturate') {
        return '-webkit-filter: saturate(50%); filter: saturate(50%);';
    }
    if ($filter == 'none') {
        return '';
    }
}
