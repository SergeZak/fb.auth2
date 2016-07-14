<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Comments <small>Take part in the discussion</small>
        </h1>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-12">


        <form action="/comments/add_comment" method="post" class="form-group">
            <textarea name="comment_body" class="form-control"></textarea>
            <input type="hidden" name="parent_id">

            <button type="submit" class="btn btn-primary">Send Comment</button>
        </form>


            <?php

            function  build_tree($commentsTree,$parent_id){
                if(is_array($commentsTree) && isset($commentsTree[$parent_id])){
                    $tree = '<ul>';
                    foreach($commentsTree[$parent_id] as $comment){
                        $tree .= '<li>'.$comment['body'] . ' parent_id is ' . $parent_id;
                        $tree .=  build_tree($commentsTree,$comment['id']);
                        $tree .= '</li>';
                    }
                    $tree .= '</ul>';
                }
                else return null;
                return $tree;
            }

            echo build_tree($commentsTree,0);
            ?>

    </div>
</div>