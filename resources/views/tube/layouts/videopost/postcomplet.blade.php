@foreach ($post as $post)

<div class="large-8 columns">
    <div class="blog-post">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="blog-post-heading">
                    <h3><a href="#">{{$post->post_titulo}} </a></h3>
                    <p>
                        <span><i class="fa fa-clock-o"></i>{{$post->post_fecha_registro}}</span>
                    </p>
                </div>
                <div class="blog-post-content">
                    <div class="blog-post-img">
                        <img src="{{imagen480($post->post_imagen)}}" alt="blog image">
                    </div>
                    {{post($post->post_contenido)}}
                    <div class="blog-post-extras">
                        <div class="categories extras">
                            <button><i class="fa fa-folder-open"></i>categories</button>
                            <a href="#">{{validarlista($post->post_categoria,4)}}</a>
                        </div>
                        <div class="tags extras">
                            <button><i class="fa fa-tags"></i>tags</button>
                            <a href="#">3d movies</a>
                            <a href="#">videos</a>
                            <a href="#">HD</a>
                            <a href="#">Movies</a>
                        </div>
                        <div class="social-share extras">
                            <div class="post-like-btn clearfix">
                                <div class="easy-share" data-easyshare data-easyshare-http data-easyshare-url="http://joinwebs.com">

                                    <button class="float-left"><i class="fa fa-share-alt"></i>share</button>
                                    <!-- Facebook -->
                                    <button class="removeBorder" data-easyshare-button="facebook">
                                        <span class="fa fa-facebook"></span>
                                    </button>

                                    <!-- Twitter -->
                                    <button class="removeBorder" data-easyshare-button="twitter" data-easyshare-tweet-text="">
                                        <span class="fa fa-twitter"></span>
                                    </button>

                                    <!-- Google+ -->
                                    <button class="removeBorder" data-easyshare-button="google">
                                        <span class="fa fa-google-plus"></span>
                                    </button>

                                    <div data-easyshare-loader>Loading...</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- post written by
                    <div class="blog-pagination text-center">
                        <a href="#"><i class="fa fa-long-arrow-left left-arrow"></i>previous post</a>
                        <a href="#">next post<i class="fa fa-long-arrow-right right-arrow"></i></a>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div><!-- end blog post -->
    <!-- post written by
    <div class="blog-post-written">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="media-object">
                    <div class="media-object-section">
                        <div class="blog-post-author-img">
                            <img src="images/blog-post-author-img.png" alt="blog post author">
                        </div>
                    </div>
                    <div class="media-object-section">
                        <div class="blog-post-author-des">
                            <h5>Written by Admin</h5>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo. Iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     Comments -->
    <section class="content comments">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="main-heading borderBottom">
                    <div class="row padding-14">
                        <div class="medium-12 small-12 columns">
                            <div class="head-title">
                                <i class="fa fa-comments"></i>
                                <h4>Comments <span>(4)</span></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="comment-box thumb-border">
                    <div class="media-object stack-for-small">
                        <div class="media-object-section comment-img text-center">
                            <div class="comment-box-img">
                                <img src= "images/post-author-post.png" alt="comment">
                            </div>
                            <h6><a href="#">Joseph John</a></h6>
                        </div>
                        <div class="media-object-section comment-textarea">
                            <form method="post">
                                <textarea name="commentText" placeholder="Add a comment here.."></textarea>
                                <input type="submit" name="submit" value="send">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="comment-sort text-right">
                    <span>Sort By : <a href="#">newest</a> | <a href="#">oldest</a></span>
                </div>

                <!-- main comment -->
                <div class="main-comment showmore_one">
                    <div class="media-object stack-for-small">
                        <div class="media-object-section comment-img text-center">
                            <div class="comment-box-img">
                                <img src= "images/post-author-post.png" alt="comment">
                            </div>
                        </div>
                        <div class="media-object-section comment-desc">
                            <div class="comment-title">
                                <span class="name"><a href="#">Joseph John</a> Said:</span>
                                <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                            </div>
                            <div class="comment-text">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                            </div>
                            <div class="comment-btns">
                                <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                <span class='reply float-right hide-reply'></span>
                            </div>

                            <!--sub comment-->
                            <div class="media-object stack-for-small reply-comment">
                                <div class="media-object-section comment-img text-center">
                                    <div class="comment-box-img">
                                        <img src= "images/post-author-post.png" alt="comment">
                                    </div>
                                </div>
                                <div class="media-object-section comment-desc">
                                    <div class="comment-title">
                                        <span class="name"><a href="#">Joseph John</a> Said:</span>
                                        <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                    </div>
                                    <div class="comment-text">
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                    </div>
                                    <div class="comment-btns">
                                        <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                        <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                        <span class='reply float-right hide-reply'></span>
                                    </div>
                                </div>
                            </div><!-- end sub comment -->

                            <!--sub comment-->
                            <div class="media-object stack-for-small reply-comment">
                                <div class="media-object-section comment-img text-center">
                                    <div class="comment-box-img">
                                        <img src= "images/post-author-post.png" alt="comment">
                                    </div>
                                </div>
                                <div class="media-object-section comment-desc">
                                    <div class="comment-title">
                                        <span class="name"><a href="#">Joseph John</a> Said:</span>
                                        <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                    </div>
                                    <div class="comment-text">
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                    </div>
                                    <div class="comment-btns">
                                        <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                        <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                        <span class='reply float-right hide-reply'></span>
                                    </div>

                                </div>
                            </div><!-- end sub comment -->

                        </div>
                    </div>

                    <div class="media-object stack-for-small">
                        <div class="media-object-section comment-img text-center">
                            <div class="comment-box-img">
                                <img src= "images/post-author-post.png" alt="comment">
                            </div>
                        </div>
                        <div class="media-object-section comment-desc">
                            <div class="comment-title">
                                <span class="name"><a href="#">Joseph John</a> Said:</span>
                                <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                            </div>
                            <div class="comment-text">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                            </div>
                            <div class="comment-btns">
                                <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                <span class='reply float-right hide-reply'></span>
                            </div>

                        </div>
                    </div>

                    <div class="media-object stack-for-small">
                        <div class="media-object-section comment-img text-center">
                            <div class="comment-box-img">
                                <img src= "images/post-author-post.png" alt="comment">
                            </div>
                        </div>
                        <div class="media-object-section comment-desc">
                            <div class="comment-title">
                                <span class="name"><a href="#">Joseph John</a> Said:</span>
                                <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                            </div>
                            <div class="comment-text">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                            </div>
                            <div class="comment-btns">
                                <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                <span class='reply float-right hide-reply'></span>
                            </div>
                            <!--sub comment-->
                            <div class="media-object stack-for-small reply-comment">
                                <div class="media-object-section comment-img text-center">
                                    <div class="comment-box-img">
                                        <img src= "images/post-author-post.png" alt="comment">
                                    </div>
                                </div>
                                <div class="media-object-section comment-desc">
                                    <div class="comment-title">
                                        <span class="name"><a href="#">Joseph John</a> Said:</span>
                                        <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                    </div>
                                    <div class="comment-text">
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                    </div>
                                    <div class="comment-btns">
                                        <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                        <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                        <span class='reply float-right hide-reply'></span>
                                    </div>
                                    <!--sub comment-->
                                    <div class="media-object stack-for-small reply-comment">
                                        <div class="media-object-section comment-img text-center">
                                            <div class="comment-box-img">
                                                <img src= "images/post-author-post.png" alt="comment">
                                            </div>
                                        </div>
                                        <div class="media-object-section comment-desc">
                                            <div class="comment-title">
                                                <span class="name"><a href="#">Joseph John</a> Said:</span>
                                                <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                            </div>
                                            <div class="comment-text">
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                            </div>
                                            <div class="comment-btns">
                                                <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                                <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                                <span class='reply float-right hide-reply'></span>
                                            </div>
                                        </div>
                                    </div><!-- end sub comment -->
                                </div>
                            </div><!-- end sub comment -->
                        </div>
                    </div>
                </div><!-- End main comment -->

            </div>
        </div>
    </section><!-- End Comments -->
    <!-- ad Section -->
    <div class="googleAdv">
        <a href="#"><img src="images/goodleadv.png" alt="googel ads"></a>
    </div><!-- End ad Section -->
</div>
@endforeach
