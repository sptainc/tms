<?php

namespace App\Admin\Controllers;

use App\UserGuide;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserGuideController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Hướng dẫn sử dụng';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserGuide());
        $grid->model()->orderBy('created_at', 'desc');
        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('uri', __('Uri'));
        $grid->column('parent')->display(function () {
            $questParent = UserGuide::find($this->parent_id);
            if ( $questParent )
                return $questParent->title;
            return "";
        });
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(UserGuide::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('uri', __('Uri'));
        $show->field('content', __('Content'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new UserGuide());

        $form->text('title', __('Title'));
        $form->text('uri', __('Uri'));
        $form->markdown('content', __('Content'));

        $form->select('parent_id')->options(function ($id) {
            $question = UserGuide::find($id);

            if ($question) {
                return [$question->id => $question->title];
            }
        })->ajax('/api/user-guides');

        return $form;
    }
}
