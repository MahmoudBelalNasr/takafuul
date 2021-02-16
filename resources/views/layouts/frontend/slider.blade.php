
<div class="slider">
    <ul id="slider" class="the-slider-inner">

        @foreach($sliders as $slider)
        <li>
            <div class="background-slider"></div>
            <img src="{{ asset('/uploads/images/'.$slider->image) }}" alt="" />
            <div class="sliderDetails">
                <div class="container">
                    <div class="titleSlider">
                        {{$slider->text}}
                    </div>
                    <div class="clearfix">
                        <a href="#" data-toggle="modal" data-target="#video">الفيديو التعريفي</a>
                        <a href="#" data-scroll-nav="1">اشترك الآن</a>
                    </div>
                </div>
            </div>
        </li>
        @endforeach

    </ul>
    <ul class="list-unstyled the-slider-control">
        <li><span id="slider-next"></span></li>
        <li><span id="slider-prev"></span></li>
    </ul> <!-- END the slider control-->
</div>
