$(document).ready(function(){var a=$("nav");a.headroom({offset:a.outerHeight(),classes:{initial:"nav-scroll-active",pinned:"pinned",unpinned:"unpinned",top:"top",notTop:"not-top"}}),$(".launch-modal").on("click",function(a){a.preventDefault(),0===$(".remodal").length&&$("body").append('<div class="remodal" data-remodal-id="modal"><button data-remodal-action="close" class="remodal-close"></button><div class="remodal-content-container"></div></div>');var e=$(this),t=e.data("modal-show-capture"),o=e.data("modal-show-share"),n=e.data("modal-type"),l=e.data("modal-id");$.post("/wp-content/themes/justsell/resources/includes/modal-ajax-processing.php",{modalType:n,modalID:l,showCapture:t,showShare:o},function(a){$(".remodal-content-container").html(a)}).done(function(){var a=$("[data-remodal-id=modal]").remodal({closeOnOutsideClick:!1});a.open()})}),$(".event-trigger").click(function(){var a=$(this),e=a.data("event-values").action,t=a.data("event-values").category,o=a.data("event-values").label;ga("send","event",t,e,o)}),$("a[href*=#]:not([href=#])").click(function(){if(location.pathname.replace(/^\//,"")===this.pathname.replace(/^\//,"")&&location.hostname===this.hostname){var a=$(this.hash);if(a=a.length?a:$("[name="+this.hash.slice(1)+"]"),a.length)return $("html,body").animate({scrollTop:a.offset().top},2e3),!1}})});