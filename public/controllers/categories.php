<?php
class Categories extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->AllGetList = $this->model->AllGetList();
        $this->view->paginatorList = $this->model->pag();

        $this->view->render('works/index');
    }
    public function sewing(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->oneWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function knitting(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->twoWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function embroidery(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->threeWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function macrame(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->fourWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function toys(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->fiveWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function origami(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->sixWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function patchwork(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->sevenWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function tapestry(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->eightWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function carving(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->nineWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function felting(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->tenWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function decoration_of_lightning(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->elevenWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function lace(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->twelveWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function costume(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->thirteenWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function modeling(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->fourteenWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function decoupage(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->fifteenWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function painting_items(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->sixteenWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function mosaic(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->seventeenWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function working_with_glass(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->eighteenWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function leather_processing(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->nineteenWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function postcards(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->twentyWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function fitodesign(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->twentyOneWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function decoration_of_the_tapes(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->twentyTwoWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function ceramics(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->twentyThreeWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function painting(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->twentyFourWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function picture(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->twentyFiveWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function batik(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->twentySixWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function beading(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->twentySevenWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function thread(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->twentyEightWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function forging(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->twentyNineWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function pyrography(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->thirtyWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function landscape(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->thirtyOneWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function cooking(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->thirtyTwoWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function makeup(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->thirtyThreeWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function tattooing(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->thirtyFourWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
    public function charms(){
        $this->view->worksMainList = $this->model->mainWorksList();
        $this->view->worksList = $this->model->thirtyFiveWorkList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('works/index');
    }
}