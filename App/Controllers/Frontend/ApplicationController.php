<?php


namespace Application\App\Controllers\Frontend;


use Application\App\Controllers\Backend\SliderController;

class ApplicationController extends FrontendController
{

    public function index()
    {
        $sliderData = new SliderController();

        $this->data('sliderData', $sliderData->getSliderData());
        $this->data('pages', 'home/home.view.php');
        return view($this->_frontPath, $this->data);
    }
}