<?php


namespace Application\App\Controllers\Backend;


use Application\App\model\Slider;
use Application\system\Input;
use Application\system\Session;
use Application\system\UploadFile;
use Application\system\Validation;

class SliderController extends BackendController
{
    protected $_validation;
    protected $_upload;
    protected $_slider;

    public function __construct()
    {
        parent::__construct();

        $this->_validation = New Validation();
        $this->_upload = new UploadFile();
        $this->_slider = new Slider();

    }

    public function index()
    {

        $this->data('title', $this->makeTitle('sliders'));
        $this->data('pages', 'sliders/show-slider.view.php');
        $this->data('sliderData', $this->_slider->Select());
        return view($this->_backendPath, $this->data);
    }

    public function addSlider()
    {
        $this->data('title', $this->makeTitle('add sliders'));
        $this->data('pages', 'sliders/add-slider.view.php');
        return view($this->_backendPath, $this->data);

    }

    public function addSliderAction()
    {
        $rules = [
            'title' => 'required|min:3|max:250|unique:tbl_sliders,title',
            'description' => 'required',
            'upload' => 'required|mimes:jpeg,jpg,gif,png'

        ];

        $this->_validation->validation($rules);

        if (!$this->_validation->isValid()) {
            Session::put('errorsMessages', $this->_validation->getErrors());
            return redirect()->back();
        }
        $data['title'] = Input::post('title');
        $data['description'] = Input::post('description');


        if ($this->_upload->check('upload')) {
            $ext = $this->_upload->getExt();
            $imageName = string_hash() . '.' . $ext;
            $uploadPath = public_path('lib/uploads/sliders');
            if ($this->_upload->move($uploadPath . '/' . $imageName)) {
                $data['image'] = $imageName;
            }
        }


        try {

            if ($this->_slider->Insert($data)) {
                $_SESSION['success'] = "Data was successfully inserted";
                redirect()->to('admin/sliders');
            }


        } catch (\PDOException $exception) {
            throw new \PDOException('There was a problems');
        }


    }


    public function getSliderData()
    {

        return $this->_slider->Select();
    }

}