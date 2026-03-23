 <style>
    /* Book Event Button Styling */
    .book-event-btn {
      padding: 10px 24px;
      border-radius: 50px;
      font-weight: 600;
      font-size: 14px;
      transition: all 0.3s ease;
      background: linear-gradient(135deg, #ff6a00 0%, #ee0979 100%);
      border: none;
      color: #fff;
      box-shadow: 0 4px 15px rgba(238, 9, 121, 0.3);
    }
    
    .book-event-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(238, 9, 121, 0.4);
      color: #fff;
    }
    
    .book-event-btn i {
      margin-right: 8px;
      font-size: 16px;
    }
    
    /* Mobile menu button styling */
    .mobile-book-btn {
      margin-top: 15px;
      padding: 10px 15px;
    }
    
    .mobile-book-btn .btn {
      background: linear-gradient(135deg, #ff6a00 0%, #ee0979 100%);
      border: none;
      color: #fff;
      border-radius: 50px;
      padding: 12px;
      font-weight: 600;
    }
    .navbar-expand-lg .navbar-nav{
      margin-top:15px !important;
    }
    /* gallery fix: ensure col classes consistent */
    .gallery-box .img-thumb img {
      width: 100%;
    }
    /* fix spacing */
    .schedule-tab-title ul.nav-tabs {
      display: block;
    }
     .carousel-item {
          position: relative;
        }

        .carousel-item img {
          height: 100vh;
          object-fit: cover;
          filter: brightness(60%);
        }

        .overlay {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: rgba(0, 0, 0, 0.5);
          z-index: 1;
        }

        .carousel-caption {
          z-index: 2;
        }

        .carousel-caption h1,
        .carousel-caption p {
          color: #fff;
          text-shadow: 0 2px 10px rgba(0,0,0,0.7);
        }
    .price-block-wrapper {
      margin-bottom: 30px;
    }
    /* sponsor button alignment */
    #sponsors .text-center .btn-common {
      margin-top: 30px;
    }
    /* fix missing hover for lightbox */
    .gallery-box .overlay-box {
      cursor: pointer;
    }
    /* ensure countdown timer responsive */
    #clock {
      font-size: 2rem;
      font-weight: 700;
    }
    @media (max-width: 768px) {
      #clock {
        font-size: 1.2rem;
      }
    }
  </style>