<?php 
class Cms5b263fefe41eb628537322_c56fef534a74fd35072846fc397451d4Class extends Cms\Classes\PageCode
{
public function onEnd()
{
    if ($this->post) {
        $this->page->title = $this->post->title;
    }
    else {
        return Redirect::to($this->pageUrl('404'));
    }
}
}
