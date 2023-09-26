@push('styles')
    <style>
        .social {
          padding: 8px;
          font-size: 30px;
          text-align: center;
          text-decoration: none;
          margin: 5px 2px;
        }

        .fa:hover {
            opacity: 0.7;
        }
        .fa-facebook {
          background: #3B5998;
          color: white;
          padding: 8px 13px 8px 13px;;
        }

        .fa-twitter {
          background: #55ACEE;
          color: white;
        }

        .fa-google {
          background: #dd4b39;
          color: white;
        }

        .fa-linkedin {
          background: #007bb5;
          color: white;
        }

        .fa-youtube {
          background: #bb0000;
          color: white;
        }

        .fa-instagram {
          background: #125688;
          color: white;
        }

        .fa-pinterest {
          background: #cb2027;
          color: white;
        }

        .fa-snapchat-ghost {
          background: #fffc00;
          color: white;
          text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }

        .fa-skype {
          background: #00aff0;
          color: white;
        }

        .fa-android {
          background: #a4c639;
          color: white;
        }

        .fa-dribbble {
          background: #ea4c89;
          color: white;
        }

        .fa-telegram {
          background: #45bbff;
          color: white;
        }

        .fa-tumblr {
          background: #2c4762;
          color: white;
        }

        .fa-whatsapp {
          background: #00b489;
          color: white;
        }

        .fa-foursquare {
          background: #45bbff;
          color: white;
        }

        .fa-stumbleupon {
          background: #eb4924;
          color: white;
        }

        .fa-flickr {
          background: #f40083;
          color: white;
        }

        .fa-yahoo {
          background: #430297;
          color: white;
        }

        .fa-soundcloud {
          background: #ff5500;
          color: white;
        }

        .fa-reddit {
          background: #ff5700;
          color: white;
        }

        .fa-rss {
          background: #ff6600;
          color: white;
        }    
    </style>    
@endpush

    <a onclick="updateShare()" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" class="social fa fa-facebook"></a>
    <a onclick="updateShare()" target="_blank" href="https://twitter.com/intent/tweet?url={{ url()->current() }}" class="social fa fa-twitter"></a>
    <a onclick="updateShare()" target="_blank" href="https://www.linkedin.com/shareArticle?url={{ url()->current() }}" class="social fa fa-linkedin"></a>
    <a onclick="updateShare()" target="_blank" href="https://api.whatsapp.com/send?text={{ url()->current() }}" class="social fa fa-whatsapp"></a>
    <a onclick="updateShare()" target="_blank" href="https://telegram.me/share/url?url={{ url()->current() }}" class="social fa fa-telegram"></a>
    <a onclick="updateShare()" target="_blank" href="https://reddit.com/submit?url={{ url()->current() }}" class="social fa fa-reddit"></a>


    @push('scripts')
      <script>
        window.id = '{!!$id!!}'
        function updateShare() {
          console.log('triggered');
          fetch(`/post/${id}/shared`);
        }
      </script>
    @endpush