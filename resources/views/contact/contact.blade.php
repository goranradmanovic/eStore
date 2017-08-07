
<div class="row">
  <div class="col-md-12">
    <div class="address">
      <div class="address__info">
        <address class="address__info--wrapper">
          <h3 class="address__info--wrapper--title">Piggy Bank</h3>
          <hr class="address__info--wrapper--horizontalrule"/>
          <div class="address__info--wrapper--details">
            <div class="address__info--wrapper--details--location">17 Dr. Mladena Stojanovica,</div>
            <div class="address__info--wrapper--details--location">Banja Luka, BIH 78000</div>
            <div class="address__info--wrapper--details--email">piggybank@gmail.com</div>
            <div class="address__info--wrapper--details--phone">P +3870651943781</div>
          </div>
        </address>
      </div>
      <div class="address__contact">
        <h3 class="address__contact--title">Contact Us</h3>
        <hr class="address__contact--horizontalrule"/>
        <form class="form-inline address__contact--form" action="{{ url('/') }}" method="post" autocomplete="off" id="contactForm" v-on:submit="contactForm"> 
          <div class="form-group">
            <input class="form-control address__contact--form--field address__contact--form--firstname" type="text" name="firstName" placeholder="First Name" v-model="firstName" value="{{ old('firstName') }}"/>
            <input class="form-control address__contact--form--field address__contact--form--lastname" type="text" name="lastName" placeholder="Last Name" v-model="lastName" value="{{ old('lastName') }}"/>
            <input class="form-control address__contact--form--field address__contact--form--email" type="email" name="emailAddress" placeholder="Email Address" v-model="email" value="{{ old('email') }}"/>
            <input class="form-control address__contact--form--field address__contact--form--message" type="text" name="message" placeholder="Message" v-model="message" value="{{ old('message') }}"/>
            <input class="btn address__contact--form--btn" type="submit" value="Send"/>{{ csrf_field() }}
          </div>
          @if (count($errors) > 0)
          	<ul class="address__contact--form--defaulterror">
          		@foreach ($errors->all() as $error)
          			<li class="text-danger">{{ $error }}</li>
          		@endforeach
          	</ul>
          @endif
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="share">Share a Project</div>
  </div>
  <div class="col-md-12">
    <div class="map" id="map"></div>
  </div>
</div>