<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BOOK NOW</title>


 <link href="img/favicon.ico" rel="icon">

 
  <link rel="stylesheet" href="{{asset('book/assets/css/style.css')}}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
</head>

<body id="top">
  @include('book.layouts.header')

  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" >
        <div class="container">
        <h2 style="color:#fff;" >BOOK POPULAR PACKEGE FOR YOU</h2>
    
        </div>
      </section>
      <!-- 
        - #TOUR SEARCH
      -->

      <section class="tour-search">
        <div class="container">

          <form action="" class="tour-search-form">

            <div class="input-wrapper">
              <label for="destination" class="input-label">Search Destination*</label>

              <input type="text" name="destination" id="destination" required placeholder="Enter Destination"
                class="input-field">
            </div>

            <div class="input-wrapper">
              <label for="people" class="input-label">Pax Number*</label>

              <input type="number" name="people" id="people" required placeholder="No.of People" class="input-field">
            </div>

            <div class="input-wrapper">
              <label for="checkin" class="input-label">Checkin Date**</label>

              <input type="date" name="checkin" id="checkin" required class="input-field">
            </div>

            <div class="input-wrapper">
              <label for="checkout" class="input-label">Checkout Date*</label>

              <input type="date" name="checkout" id="checkout" required class="input-field">
            </div>

            <button type="submit" class="btn btn-secondary">Inquire now</button>

          </form>

        </div>
      </section>





      <!-- 
        - #POPULAR
      -->

      <section class="popular" id="destination">
        <div class="container">

          <p class="section-subtitle">Find Beautiful places</p>

          <h2 class="h2 section-title">Popular destination</h2>

          <p class="section-text">
            This is among the most popular destination in the world. It is a place where you can find combination of
            nature and culture. You can find the most beautiful places in the world.
          </p>

          <ul class="popular-list">
                  @isset($toursites)
                        @forelse($toursites as $toursite)
            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="{{ $toursite->allToursiteimages ? url(\Storage::url($toursite->allToursiteimages->first()->image)) : '' }}" alt="{{$toursite->name ?? '-'}}" loading="lazy">
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>

                  <p class="card-subtitle">
                    <a href="#"> {{$toursite->country->name ?? 'Tanzanaia'}} </a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="#">{{$toursite->name ?? '-'}}</a>
                  </h3>

                  <p class="card-text">
                    {{Str::limit($toursite->description,150) ?? '-'}}
                  </p>

                </div>

              </div>
            </li>
            @empty
            <p>No Toursite Found</p>
            @endforelse
            @endisset

          </ul>

          <button class="btn btn-primary"> <a href="{{route('tour.sites')}}" style="color:#fff;" >More destintion</a> </button>

        </div>
      </section>





      <!-- 
        - #PACKAGE
      -->

      <section class="package" id="package">
        <div class="container">

          <p class="section-subtitle">Popular Packeges</p>

          <h2 class="h2 section-title">Checkout Our Packeges</h2>

          <p class="section-text">
            This is the recommended packeges for you. You can find the most beautiful places in the world at affordable price.
          </p>

          <ul class="package-list">

             @isset($toursites)
                        @forelse($toursites as $toursite)
            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="{{ $toursite->allToursiteimages ? url(\Storage::url($toursite->allToursiteimages->first()->image)) : '' }}" alt="{{$toursite->name ?? '-'}}" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Experience The Great Holiday On {{$toursite->name ?? '-'}}</h3>

                  <p class="card-text">
                    {{Str::limit($toursite->description,150) ?? '-'}}
                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="time"></ion-icon>

                        <p class="text">September</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="people"></ion-icon>

                        <p class="text">people: 5</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>

                        <p class="text">{{$toursite->country->name ?? '-'}}</p>
                      </div>
                    </li>
                   

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                    <p class="reviews">(25 reviews)</p>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                  </div>

                  <p class="price">
                    $750
                    <span>/ per person</span>
                  </p>

                  {{-- <button class="btn btn-secondary">Book Now</button> --}}
                    <form action="{{route('bookings.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="toursite_id" value="{{$toursite->id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <button type="submit" class="btn btn-secondary">Book Now</button>
                    </form>

                </div>

              </div>
            </li>
            @empty
                    <p>Package are unavilable right now</p>
                    @endforelse
                    @endisset

          </ul>


        </div>
      </section>





      <!-- 
        - #GALLERY
      -->

      <!-- 
        - #CTA
      -->


    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy;  <a href="">codewithsadee</a>. All rights reserved
        </p>

        <ul class="footer-bottom-list">

          <li>
            <a href="#" class="footer-bottom-link">Privacy Policy</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">Term & Condition</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">FAQ</a>
          </li>

        </ul>

      </div>
    </div>

  </footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="{{asset('book/assets/js/script.js')}}"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>