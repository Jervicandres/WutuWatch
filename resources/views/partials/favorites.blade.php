@extends('layouts.app')

@section('pageTitle', 'My Favorites') 

@section('content')

<div class="container bg-overlay-1 my-4 min-vh-100 pos-relative pb-5">
        <div class="p-4 text-white border-bottom border-primary mb-3">
                <h3>My Favorites</h3>
            </div>
        <div class="row g-0 movie-list mb-2" id="watchlist">
            <!-- foreach -->
            @if($favorites->count())
                @foreach($favorites as $favorite)
                <div class="col-md my-2 d-flex justify-content-center pos-relative">
                        
                        <div class="card bg-custom-1 text-white card-size mx-2" name="movie-card">
                        <form action="{{ route($favorite->media_type .'.favorite', ['id' => $favorite->movieId , 'media_type' => $favorite->media_type]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn text-white m-0 p-0 delete-watchlist">
                                <span class="d-flex align-items-center"><i class="fas fa-minus-square fa-2x remove-watchlist" style="color:red;"></i></span>
                            </button>
                        </form>
                        <img src="https://via.placeholder.com/238x357/000000/FFFFFF/?text=NoImage" class="card-img-top img-fluid align-poster-img" name="poster-img">
                        <div class="card-body ">
                            <div class="mb-2 mt-2 d-flex flex-column justify-content-evenly">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-title text-truncate mt-1" name="thumbnail-title">Loading...</p>
                                    <span class="card-text fw-bolder bg-overlay-1 rating" name="rating">0</span>
                                </div>
                                <small class="card-title text-truncate" name="date-released">Jan 1, 2000</small>
                            </div>
                            <a onclick="movieSelected(580489,'movie')" class="d-flex overview-text text-white rounded-3" href="{{route($favorite->media_type, ['id' => $favorite->movieId, 'media_type' => $favorite->media_type])}}" name="movie-link">
                            <div class=" overview-div">
                                <div class="py-3 px-2 d-flex flex-column text-center bg-custom-1">
                                <strong name="overview-title">Title</strong>
                                <small name="genres">Genres</small>
                                </div>
                                <div class="p-1"><p class="" name="overview">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed dolorum doloribus adipisci quidem nobis voluptatibus nesciunt? Nesciunt ex eius vero laborum ullam! Magnam nam quae ex corporis accusamus dolorum? Tempore sapiente quaerat sunt consequatur at laboriosam praesentium nisi ea possimus!</p></div>
                                <div class="more-details p-2"><span>More Details <i class="fas fa-chevron-down"></i></span></div>
                            </div>
                            </a>
                        </div>
                        </div>
                    
                </div>
                @endforeach
            @else
            <h5>You don't have favorite yet.</h5>
            <a href="{{ route('movie-list') }}" target="_blank" rel="noopener noreferrer">Look for movies or shows to watch?</a>
            @endif
            <!-- endforeach -->
        </div>
        <div class="container-fluid-lg d-flex justify-content-center align-items-center fixed-paginator" id="page-container">
            {{$favorites->links()}}
        </div>
    </div>

@endsection
