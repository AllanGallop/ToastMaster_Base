<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Leighton Buzzard Speakers Club</title>
        <link rel="stylesheet" href="{{ URL::to('/assets/css/main.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
    </head>
    <body class="antialiased" onload="dragScroll('scroll')">
        <div class="wrapper" id="wrapper">
            <nav>
                <a href="#about" class="about active">about</a>
                <a href="#news" class="news">news</a>
                <a href="#events" class="events">events</a>
                <a href="#contact" class="contact">contact</a>
                <a href="/login">login</a>
            </nav>
            <section id="splash-page" data-colour="white">
                <img src="{{ URL::to('/assets/images/lb_logo_main.webp') }}"/>
                <h1>
                    LEIGHTON BUZZARD
                    <small>Speakers</small>
                </h1>
                <blockquote>
                    "Everyone has a voice, find yours"
                </blockquote>
                <span class="arrow down material-symbols-outlined">
                    expand_circle_down
                </span>
            </section>
            <section id="about"  data-colour="white">
                <ul>
                    <li>
                        <div class="material-icons">campaign</div>
                        <h3>Communicate Effectively</h3>
                        <p>Deliver your message with confidence and precision</p>
                    </li>
                    <li>
                        <div class="material-icons">school</div>
                        <h3>Develop language skills</h3>
                        <p>Cultivate reading, writing, listening and speaking skills</p>
                    </li>
                    <li>
                        <div class="material-icons">accessibility_new</div>
                        <h3>Interpret others </br>better</h3>
                        <p>Understand & decode other peoples moods and emotions</p>
                    </li>
                    <li>
                        <div class="material-icons">mood</div>
                        <h3>Gain confidence</h3>
                        <p>Improve your self esteem and trust in your skills and abilities</p>
                    </li>
                </ul>
            </section>
            <section id="news"  data-colour="black">
                <div id="news-scroller">
                    <div class="content noselect" id="scroll">
                    @foreach($posts as $post)
                        <article class="articles">
                            <h3>{{$post->title}}</h3>
                            <p class="noselect">{!! $post->content !!}</p>
                        </article>
                    @endforeach
                    </div>
                </div>
            </section>
            <section id="events"  data-colour="white">
               <div id="events-scroller">
                    <div class="content noselect scroll" id="scroll2">
                    @foreach($events as $event)
                        <article class="articles">
                            <span class="date">
                                <span style="font-size:.9em"> {{ Carbon\Carbon::parse($event->starts)->format('F') }} </span>
                                <span style="font-size:1.5em"> {{ Carbon\Carbon::parse($event->starts)->format('jS') }} </span>
                                <span style="font-size:.9em"> {{ Carbon\Carbon::parse($event->starts)->format('Y') }} </span>
                            </span>
                            <span class="info">
                                <h3>{{$event->title}}</h3>
                                <div style="display: flex;
                                            flex-direction: row;
                                            justify-content: center;
                                            align-content: center;
                                            align-items: center;";>
                                    <x-forkawesome-clock-o style="width:1.3em;color:green"/>
                                        {{ Carbon\Carbon::parse($event->starts)->format('H:i') }}
                                        @if( !empty($event->ends) )
                                            <x-forkawesome-clock-o style="width:1.3em;color:red;margin-left:2em;"/>
                                            {{ Carbon\Carbon::parse($event->ends)->format('H:i') }}
                                        @endif
                                </div>
                                <p class="noselect">{!! $event->description !!}</p>
                            <span>
                        </article>
                    @endforeach
                    </div>
                </div>
            </section>
            <section id="contact"  data-colour="black">
                <form class="contact-form" method="POST" action="/contact">
                    @csrf
                    <fieldset>
                        <label for="name">Name</label>
                        <input name="name" id="name" type="text" REQUIRED/>
                    </fieldset>
                    <fieldset>
                        <label for="email">Email</label>
                        <input name="email" id="email" type="text" REQUIRED/>
                    </fieldset>
                    <fieldset>
                        <label for="message">Message</label>
                        <textarea name="message" id="message" style="height:200px"></textarea>
                    </fieldset>
                    <button type="submit">Send</button>
                </form>
            </section>
        </div>
    </body>
    <footer>
        <script>
            function dragScroll(container){
                const ele = document.getElementById(container);
                let pos = { top: 0, left: 0, x: 0, y: 0 };

                const mouseMoveHandler = function (e) {
                    // Add styles
                    ele.style.cursor = 'grabbing';
                    ele.style.userSelect = 'none';

                    // How far the mouse has been moved
                    const dx = e.clientX - pos.x;
                    const dy = e.clientY - pos.y;
                
                    // Scroll the element
                    ele.scrollTop = pos.top - dy;
                    ele.scrollLeft = pos.left - dx;
                };

                const mouseDownHandler = function (e) {
                    pos = {
                        // The current scroll
                        left: ele.scrollLeft,
                        top: ele.scrollTop,
                        // Get the current mouse position
                        x: e.clientX,
                        y: e.clientY,
                    };
                
                    document.addEventListener('mousemove', mouseMoveHandler);
                    document.addEventListener('mouseup', mouseUpHandler);
                };

                const mouseUpHandler = function () {
                    document.removeEventListener('mousemove', mouseMoveHandler);
                    document.removeEventListener('mouseup', mouseUpHandler);
                
                    ele.style.cursor = 'grab';
                    ele.style.removeProperty('user-select');
                };

                ele.addEventListener('mousedown', mouseDownHandler);
            }


                ActiveScroll = true;
                colour = 'white';

                function scrollDown(el) {
                    if(ActiveScroll){
                        el.animate({
                            scrollLeft: el.width()
                        }, 15000, function() {
                            scrollUp(el)
                        });
                    }
                };

                function scrollUp(el) {
                    if(ActiveScroll){
                        el.animate({
                            scrollLeft: 0
                        }, 1500, function() {
                            scrollDown(el);
                        });
                    }
                };

                scrollDown($("#scroll"));
                scrollDown($("#scroll2"));

                $( "#scroll" ).on('touchstart click',function() {
                     ActiveScroll = false;
                     $("#scroll").stop();
                });

                

                const sections = document.querySelectorAll("section");
                const nav = document.querySelector("nav");
                const navLi = document.querySelectorAll("nav a");

                $('.wrapper').on('scroll',function(){
                    var current = "";

                    sections.forEach((section) => {
                        const wrapper = document.getElementById("wrapper");
                        const sectionTop = section.offsetTop;
                        const pageOffset = wrapper.scrollTop;
                        if (pageOffset >= sectionTop) {
                            current = section.getAttribute("id"); 
                            colour = section.dataset.colour;
                        }
                    });
                    nav.style.color = colour;
                    navLi.forEach((a) => {
                        a.classList.remove("active");
                        if (a.classList.contains(current)) {
                        a.classList.add("active");
                        }
                    });
                });


        </script>
    </footer>
</html>
