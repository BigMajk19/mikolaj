<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Mikołaj<span>NaŚwięta</span>
    </a>
    <span>Panel Admina</span>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body overflow-auto">
    <ul class="nav">
      <!-- panel MAIN-->
      <li class="nav-item nav-category">
        Main
      </li>
      <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
          </a>
      </li>
      <!-- Panel Poczty-->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Poczta e-mail</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="emails">
        <ul class="nav sub-menu">
          <li class="nav-item">
            <a href="{{ route('admin.inbox') }}" class="nav-link">Skrzynka odbiorcza</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Wysłane</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Wyślij wiadomość</a>
          </li>
        </ul>
        </div>
      </li>
      <!-- 1 panel WIZYTY-->
      <li class="nav-item nav-category">
        Wizyty
      </li>
      <li class="nav-item">
        <a href="{{ route('all.typevisits') }}" class="nav-link">
          <i class="link-icon" data-feather="message-square"></i>
          <span class="link-title">Typy Kategorii Wizyt</span>
        </a>
      </li>
        <!-- 1 panel Wizyty - Wszystkie wizyty-->
      <li class="nav-item">
        <a href="{{ route('show.all.visits') }}" class="nav-link">
          <i class="link-icon" data-feather="message-square"></i>
          <span class="link-title">Wszystkie Wizyty</span>
        </a>
      </li>
        <!-- 1 panel Wizyty - Nowe wizyty-->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#noweWizyty" role="button" aria-expanded="false" aria-controls="newVisits">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Nowe wizyty</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="noweWizyty">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ route('show.visits.new') }}" class="nav-link">Nie potwierdzone</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('show.visits.not_paid') }}" class="nav-link">Nie opłacone</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('show.visits.not_sign_to') }}" class="nav-link">Nie przypisane</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('show.visits.reserve_list') }}" class="nav-link">Lista rezerwowa</a>
            </li>
          </ul>
        </div>
      </li>
        <!-- 1 panel Wizyty - Poszczególne wizyty-->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#PoszczegolneWizyty" role="button" aria-expanded="false" aria-controls="visits">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Poszczególne wizyty</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="PoszczegolneWizyty">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ route('show.visits.paid_and_sign_to') }}" class="nav-link">Opłacone i przypisane</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('show.visits.realized') }}" class="nav-link">Zrealizowane</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('show.visits.canceled') }}" class="nav-link">Anulowane/Rezygnacja</a>
            </li>
          </ul>
        </div>
      </li>
        <!-- 1 panel Wizyty - Przypisane wizyty-->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#przypisaneWizyty" role="button" aria-expanded="false" aria-controls="signtovisits">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Przypisane wizyty</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="przypisaneWizyty">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="#" class="nav-link">Wszystkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">mazowieckie</a>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">dolnośląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">kujawsko-pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubelskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubuskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">łódzkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">małopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">opolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podkarpackie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podlaskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">śląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">świętokrzyskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">warmińsko-mazurskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">wielkopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">zachodniopomorskie</a>
            </li> --}}
          </ul>
        </div>
      </li>
    <!-- 2 panel KONDYDACI DO PRACY-->
      <li class="nav-item nav-category">
        Kandydaci do pracy
      </li>
      <!-- 2 panel Kandydaci do pracy - Wszyscy-->
      <li class="nav-item">
        <a href="{{ route('show.all.candidates') }}" class="nav-link">
          <i class="link-icon" data-feather="hash"></i>
          <span class="link-title">Wszyscy Kandydaci</span>
        </a>
      </li>
      <!-- 2 panel Kandydaci do pracy - Mikołaje-->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#kandydaciMikolaje" role="button" aria-expanded="false" aria-controls="candidatesforjobSanta">
          <i class="link-icon" data-feather="feather"></i>
          <span class="link-title">Mikołaje</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="kandydaciMikolaje">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ route('show.all.candidates.santa') }}" class="nav-link">Wszyscy</a>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">mazowieckie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">dolnośląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">kujawsko-pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubelskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubuskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">łódzkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">małopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">opolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podkarpackie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podlaskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">śląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">świętokrzyskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">warmińsko-mazurskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">wielkopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">zachodniopomorskie</a>
            </li> --}}
          </ul>
        </div>
      </li>
      <!-- 2 panel Kandydaci do pracy - Śnieżynki-->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#kandydaciSniezynki" role="button" aria-expanded="false" aria-controls="candidatesforjobSnowflakes">
          <i class="link-icon" data-feather="feather"></i>
          <span class="link-title">Śnieżynki</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="kandydaciSniezynki">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ route('show.all.candidates.snowflake') }}" class="nav-link">Wszyscy</a>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">mazowieckie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">dolnośląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">kujawsko-pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubelskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubuskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">łódzkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">małopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">opolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podkarpackie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podlaskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">śląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">świętokrzyskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">warmińsko-mazurskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">wielkopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">zachodniopomorskie</a>
            </li> --}}
          </ul>
        </div>
      </li>
      <!-- 2 panel Kandydaci do pracy - Elfy-->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#kandydaciElfy" role="button" aria-expanded="false" aria-controls="candidatesforjobElfs">
          <i class="link-icon" data-feather="arrow-down-right"></i>
          <span class="link-title">Elfy</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="kandydaciElfy">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ route('show.all.candidates.elf') }}" class="nav-link">Wszyscy</a>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">mazowieckie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">dolnośląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">kujawsko-pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubelskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubuskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">łódzkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">małopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">opolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podkarpackie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podlaskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">śląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">świętokrzyskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">warmińsko-mazurskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">wielkopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">zachodniopomorskie</a>
            </li> --}}
          </ul>
        </div>
      </li>
    <!-- 3 panel PARTNERZY-->
      <li class="nav-item nav-category">
        Partnerzy
      </li>
      <!-- 3 panel Partnerzy - Współpracujący-->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#partnerzyWspolpracujacy" role="button" aria-expanded="false" aria-controls="general-pages">
          <i class="link-icon" data-feather="book"></i>
          <span class="link-title">Współpracujący</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="partnerzyWspolpracujacy">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="#" class="nav-link">Wszyscy Partnerzy</a>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">mazowieckie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">dolnośląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">kujawsko-pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubelskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubuskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">łódzkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">małopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">opolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podkarpackie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podlaskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">śląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">świętokrzyskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">warmińsko-mazurskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">wielkopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">zachodniopomorskie</a>
            </li> --}}
          </ul>
        </div>
      </li>
      <!-- 3 panel Partnerzy - Kandydaci-->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#kandydaciPartnerzy" role="button" aria-expanded="false" aria-controls="authPages">
          <i class="link-icon" data-feather="unlock"></i>
          <span class="link-title">Kandydaci</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="kandydaciPartnerzy">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="#" class="nav-link">Wszyscy kandydaci</a>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">mazowieckie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">dolnośląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">kujawsko-pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubelskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubuskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">łódzkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">małopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">opolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podkarpackie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podlaskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">śląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">świętokrzyskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">warmińsko-mazurskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">wielkopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">zachodniopomorskie</a>
            </li> --}}
          </ul>
        </div>
      </li>
      <!-- 3 panel Partnerzy - Wysłane stroje-->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#wyslaneStroje" role="button" aria-expanded="false" aria-controls="errorPages">
          <i class="link-icon" data-feather="cloud-off"></i>
          <span class="link-title">Wysłane stroje</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="wyslaneStroje">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="#" class="nav-link">Wszyscy Partnerzy</a>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">mazowieckie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">dolnośląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">kujawsko-pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubelskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubuskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">łódzkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">małopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">opolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podkarpackie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podlaskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">śląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">świętokrzyskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">warmińsko-mazurskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">wielkopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">zachodniopomorskie</a>
            </li> --}}
          </ul>
        </div>
      </li>
      <!-- 3 panel Partnerzy - Prowizje do wypłaty-->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#prowizje" role="button" aria-expanded="false" aria-controls="errorPages">
          <i class="link-icon" data-feather="cloud-off"></i>
          <span class="link-title">Prowizje do wypłaty</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="prowizje">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="#" class="nav-link">Wszyscy Partnerzy</a>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">mazowieckie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">dolnośląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">kujawsko-pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubelskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubuskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">łódzkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">małopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">opolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podkarpackie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podlaskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">śląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">świętokrzyskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">warmińsko-mazurskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">wielkopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">zachodniopomorskie</a>
            </li> --}}
          </ul>
        </div>
      </li>
    <!-- 4 panel PRZYCHODY-->
      <li class="nav-item nav-category">
        Przychody
      </li>
      <!-- 4 panel Przychody - Opłaty Partnerów-->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#oplatyPartnerow" role="button" aria-expanded="false" aria-controls="general-pages">
          <i class="link-icon" data-feather="book"></i>
          <span class="link-title">Opłaty Partnerów</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="oplatyPartnerow">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="#" class="nav-link">Wszyscy Partnerzy</a>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">mazowieckie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">dolnośląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">kujawsko-pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubelskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubuskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">łódzkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">małopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">opolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podkarpackie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podlaskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">śląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">świętokrzyskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">warmińsko-mazurskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">wielkopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">zachodniopomorskie</a>
            </li> --}}
          </ul>
        </div>
      </li>
      <!-- 4 panel Przychody - Wizyty-->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#przychodyWizyty" role="button" aria-expanded="false" aria-controls="general-pages">
          <i class="link-icon" data-feather="book"></i>
          <span class="link-title">Wizyty</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <!-- 4 panel Przychody - Wszystkie wizyty-->
        <div class="collapse" id="przychodyWizyty">
          <ul class="nav sub-menu">
            <li class="nav-item nav-category">
              Wszystkie wizyty
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Wszystkie wizyty</a>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">mazowieckie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">dolnośląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">kujawsko-pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubelskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubuskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">łódzkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">małopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">opolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podkarpackie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podlaskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">śląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">świętokrzyskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">warmińsko-mazurskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">wielkopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">zachodniopomorskie</a>
            </li> --}}
            <!-- 4 panel Przychody - Anulowane wizyty-->
            <li class="nav-item nav-category">
              Anulowane wizyty
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Wszystkie anulowane wizyty</a>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">mazowieckie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">dolnośląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">kujawsko-pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubelskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubuskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">łódzkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">małopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">opolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podkarpackie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podlaskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">śląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">świętokrzyskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">warmińsko-mazurskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">wielkopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">zachodniopomorskie</a>
            </li> --}}
            <!-- 4 panel Przychody - Odbyte wizyty-->
            <li class="nav-item nav-category">
              Odbyte wizyty
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Wszystkie odbyte wizyty</a>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">mazowieckie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">dolnośląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">kujawsko-pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubelskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubuskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">łódzkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">małopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">opolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podkarpackie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podlaskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">śląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">świętokrzyskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">warmińsko-mazurskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">wielkopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">zachodniopomorskie</a>
            </li> --}}
          </ul>
        </div>
      </li>
    <!-- 5 panel KOSZTY-->
      <li class="nav-item nav-category">
        Koszty
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#reklamaKoszty" role="button" aria-expanded="false" aria-controls="advertismentCost">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Reklama</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
      <!-- 5 panel Koszty - Reklama-->
        <div class="collapse" id="reklamaKoszty">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="#" class="nav-link">Cała Polska</a>
            </li>
            {{-- <li class="nav-item nav-category">
              Województwa
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">mazowieckie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">dolnośląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">kujawsko-pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubelskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubuskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">łódzkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">małopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">opolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podkarpackie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podlaskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">śląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">świętokrzyskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">warmińsko-mazurskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">wielkopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">zachodniopomorskie</a>
            </li> --}}
          </ul>
        </div>
      </li>
      <!-- 5 panel Koszty - Przesyłki-->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#reklamaPrzesylki" role="button" aria-expanded="false" aria-controls="curier">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Przesyłki</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="reklamaPrzesylki">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="#" class="nav-link">Cała Polska</a>
            </li>
            {{-- <li class="nav-item nav-category">
              Województwa
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">mazowieckie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">dolnośląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">kujawsko-pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubelskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubuskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">łódzkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">małopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">opolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podkarpackie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podlaskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">śląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">świętokrzyskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">warmińsko-mazurskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">wielkopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">zachodniopomorskie</a>
            </li> --}}
          </ul>
        </div>
      </li>
    <!-- 6 panel ZYSK-->
      <li class="nav-item nav-category">
        Zysk
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="link-icon" data-feather="message-square"></i>
          <span class="link-title">Cała Polska</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#zyskWojewodztwa" role="button" aria-expanded="false" aria-controls="profit">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Województwa</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="zyskWojewodztwa">
            <!-- 6 panel Zysk - Wojewodztwa-->
          <ul class="nav sub-menu">
            <li class="nav-item nav-category">
              Województwa
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">mazowieckie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">dolnośląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">kujawsko-pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubelskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">lubuskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">łódzkie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">małopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">opolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podkarpackie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">podlaskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">pomorskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">śląskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">świętokrzyskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">warmińsko-mazurskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">wielkopolskie</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">zachodniopomorskie</a>
            </li> --}}
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>


