<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php foreach ($sliderData as $key => $sld) : ?>
                            <?php if ($key == 0) : ?>
                                <li data-target="#slider-carousel" data-slide-to="<?= $key ?>" class="active"></li>
                            <?php else: ?>
                                <li data-target="#slider-carousel" data-slide-to="<?= $key ?>"></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ol>

                    <div class="carousel-inner">
                        <?php foreach ($sliderData as $key => $slider) : ?>
                            <?php if ($key == 0) : ?>
                                <div class="item active">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2><?=str_limit($slider->title,20) ?></h2>
                                        <p>
                                            <?=str_limit(html_entity_decode($slider->description),100); ?>
                                        </p>
                                        <button type="button" class="btn btn-default get">Read More...</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="<?= url('lib/uploads/sliders/' . $slider->image) ?>" class="pricing"
                                             alt=""/>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2><?=str_limit($slider->title,20) ?></h2>
                                        <p>
                                            <?=str_limit(html_entity_decode($slider->description),100); ?>
                                        </p>
                                        <button type="button" class="btn btn-default get">Read More...</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="<?= url('lib/uploads/sliders/' . $slider->image) ?>" class="pricing"
                                             alt=""/>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>


                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->






