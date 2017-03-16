@include('partials/header')


<!-- Page preloader -->
<div id="loading">
   <div id="preloader">
      <span></span>
      <span></span>
   </div>
</div>

<!-- Overlay -->
<div class="global-overlay">
   <div class="overlay">

      <div id="container">
         <div id="output" class="back-fss"></div>
      </div>

   </div>
</div>

<!-- START - Home Part -->
<section id="home-wrap">

   <canvas id="square-canvas" width="" height=""></canvas>

   <!-- Stars Overlay - Uncomment the next 3 lines to activate the effect-->
   <!-- <div id='stars'></div>
   <div id='stars2'></div>
   <div id='stars3'></div> -->

   <div class="content">

      <!-- Your logo -->
      <img src="img/blockchain3.png" alt="" class="brand-logo text-intro opacity-0" />

      <h1 class="text-intro opacity-0"><span class="polyfy-title">Whitepaper Generator</span></h1>

      <p class="text-intro opacity-0">Want to impress your friends?  Having trouble generating a whitepaper for your next <strike>scam</strike> project?  Seize your blockchain oracle status with this whitepaper generator.</p>

      <a href="#" id="open-more-info" data-target="info-wrap" class="action-btn trigger text-intro opacity-0">Get Started</a>

   </div> <!-- /. content -->

   <!-- Social icons -->
   <div class="social-icons text-intro opacity-0">

      <a href="https://twitter.com/koinster" target="_blank"><i class="fa fa-twitter"></i></a>
      <a href="https://github.com/koinster" target="_blank"><i class="fa fa-github"></i></a>

   </div> <!-- /. social-icons -->

</section>
<!-- END - Home Part -->

<!-- START - More Informations Part -->
<section id="info-wrap">

   <div class="hero">

      <div class="center-text">

         <h3 class="darky">Metachain</h3>

         <p><strong>Globally Secured Processes by Immutable Audit Trails on a Pseudo-Anonymous Privacy-Centric Open-Source Next-Generation Data Preservation Smart Contract Prediction Market Network and a Decentralized Peer-to-Peer Electronic Federated Application Platform Model for a Generalized Internet-Level Database Transaction Ledger System by Consensus Protocol Whitepaper Generator</strong></p>
         <p>&nbsp;</p>
         <p>Koinster</p>
         <p>get@koinster.com</p>
         <p>www.koinster.com</p>

      </div> <!-- /. center-text -->

   </div> <!-- /. hero -->

   <div class="dark-hero">

      <div class="center-text">

         <h3 class="lighty">Get Started</h3>

         <div class="info-contact row">

                <div class="col-xs-12 col-sm-4 col-lg-4 item-map">
                    <div class="contact-item"><i class="icon ion-document-text"></i>
                        <p>Fill out the form.  The info provided will appear on the generated .pdf file.  No information is collected, <a href="#" target="_blank">view source here.</a></p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-lg-4 item-map">
                    <div class="contact-item"><i class="icon ion-android-checkbox-outline"></i>
                        <p>Select the protocols you wish to include with your generated whitepaper.</p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-lg-4 item-map">
                    <div class="contact-item"><i class="icon ion-cash"></i>
                        <p>Profit.  Generate and download your newly created whitepaper.
                        </p>
                    </div>
                </div>

                <div class="col-xs-12 item-map">
                     <p>With any new project, the idea and resulting whitepaper is a burden upon developers looking to push their implementation out the door.  Use this whitepaper generator to take out all of hardwork and guesswork for your next <strike>scam</strike> project.  Use the .pdf to promote your product and profit from its success.</p>
                </div>

                <div class="col-xs-12 item-map">
                     <p class="small"><strong>Disclaimer:</strong> your impending blockchain oracle status is heavily dependent upon which protocols you choose to include in the whitepaper.  This generator cannot be held liable for any failed implementations.</p>
                </div>

            </div> <!-- /. info-contact -->

      </div> <!-- /. center-text -->

   </div> <!-- /. dark-hero -->

   <div class="content-form no-padding-bottom">

        <!-- START - Contact Form -->
      <form id="blockchain" name="blockchain" method="POST" action="/pdf" data-name="Blockchain Form">

         {{ csrf_field() }}

         <div class="row">

                <!-- Full name -->
                <div class="col-xs-12 col-sm-6 col-lg-6">

                    <div class="form-group">
                       <label for="name" class="small">Full Name</label>
                        <input type="text" id="name" class="form form-control" placeholder="Default: Anonymous" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Default: Anonymous'" name="name" data-name="Name">
                    </div>
                </div>

                <!-- E-mail -->
                <div class="col-xs-12 col-sm-6 col-lg-6">
                   <div class="form-group">
                      <label for="email" class="small">Email</label>
                        <input type="email" id="email" class="form form-control" placeholder="Default: (blank)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Default: (blank)'" name="email" data-name="Email Address">
                    </div>
                </div>

                <!-- Protocol -->
                <div class="col-xs-12 col-sm-6 col-lg-6">

                    <div class="form-group">
                       <label for="protocol" class="small">Protocol *</label>
                        <input type="text" id="protocol" class="form form-control" placeholder="Bitcoin, Monero, Ethereum, Metachain, etc.." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Bitcoin, Monero, Ethereum, Metachain, etc..'" name="protocol" data-name="Protocol" required="">
                    </div>
                </div>

                <!-- Coin -->
                <div class="col-xs-12 col-sm-6 col-lg-6">
                   <div class="form-group">
                      <label for="text" class="small">Coin *</label>
                        <input type="text" id="coin" class="form form-control" placeholder="bitcoin, ether, meta, etc..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'bitcoin, ether, meta, etc...'" name="coin" data-name="Coin" required="">
                    </div>
                </div>

                <!-- Title -->
                <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
                    <div class="form-group">
                       <label for="title" class="small">Title</label>
                        <textarea id="title" class="form textarea form-control" placeholder="Default: Automatically generated based on protocol selections" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Default: Automatically generated based on protocol selections'" name="title" data-name="Title"></textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-lg-12">
                   <div class="form-group">
                      <p class="lead text-center" style="color:#4d4d4d;"><strong>Protocols</strong></p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-lg-12 mx-auto">

                      <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="bitcoin" name="bitcoin" value="1" checked=""> <strong>Bitcoin:</strong> A Peer-to-Peer Electronic Cash System
                          </label>
                     </div>
                     <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="ripple" name="ripple" value="1"> <strong>The Ripple Protocol</strong> Consensus Algorithm
                          </label>
                     </div>
                     <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="ethereum" name="ethereum" value="1"> <strong>Ethereum:</strong> A Secure Decentralised Generalised Transaction Ledger
                          </label>
                     </div>
                     <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="cryptonote" name="cryptonote" value="1"> <strong>CryptoNote</strong> v 2.0
                          </label>
                     </div>
                     <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="mimblewimble" name="mimblewimble" value="1"> <strong>MimbleWimble</strong>
                          </label>
                     </div>
                     <div class="form-check">
                         <label class="form-check-label">
                           <input class="form-check-input" type="checkbox" id="lightning" name="lightning" value="1"> <strong>The Bitcoin Lightning Network:</strong> Scalable Off-Chain Instant Payments
                         </label>
                    </div>
                    <!-- coming soon
                    <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" id="tumblebit" name="tumblebit" value="1"> <strong>TumbleBit:</strong> An Untrusted Bitcoin-Compatible Anonymous Payment Hub
                        </label>
                   </div>
                -->
                     
                     
                     







               </div>

            </div>
            <p>&nbsp;</p>
         <!-- Button submit -->
         <button type="submit" id="valid-form" class="btn btn-color btn-lg btn-block"><strong>GENERATE</strong></button>

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
               <p class="small text-center" style="color:#4d4d4d;"> The generated .pdf will open in a new window</p>
            </div>
         </div>

        </form>
        <!-- END - Contact Form -->

        <!-- !!! Answer for the contact form is displayed in the next div, do not remove it. -->
        <div id="block-answer">

         <div id="answer"></div>

      </div>

   </div> <!-- /. content-form -->

   <footer>

      <p>Koinster</p>

   </footer>

</section>
<!-- END - More Informations Part -->

<!-- Button Cross to close the More Informations/Right Part -->
<div class="command-info-wrap">

   <!-- Cross to close -->
   <button class="to-close">
      <i class="icon ion-close-round"></i>
   </button>

   <!-- Arrow going down -->
   <div class="to-scroll" data-toggle="tooltip" data-placement="left" title="Scroll to see more...">
      <i class="icon ion-arrow-down-c scroll-down"></i>
   </div>

</div> <!-- /. command-info-wrap -->

<!-- Root element of PhotoSwipe, the gallery. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe.
      It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides.
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>

            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>
<!-- /. Root element of PhotoSwipe. Must have class pswp. -->







@include('partials/footer')