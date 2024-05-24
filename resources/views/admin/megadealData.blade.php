@extends('pages.adminLayout')

@push('admin-style')
    <link rel="stylesheet" href="{{ asset('css/admin/sellerData.css') }}">
@endpush

@section('admin-content')
    <div class="main-section">
        <div class="category-data">
            <div class="intro">
                <h2>Megadeals</h2>
                <div class="intro-search">
                    <div class="search-section">
                        <div class="box">
                            <form name="search">
                                <input type="text" class="input" name="txt" placeholder="Search all megadeals" onmouseout="this.value = ''; this.blur();">
                            </form>
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <table>
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">allitem</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Megadeal Discount</th>
                    <th scope="col">Dealtime</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                @if (empty($megadeals))
                    {{'no data'}}
                @else
                <tbody>
                  <tr>
                    <td data-label="Id">{{$megadeals[0]['deal_id']}}</td>
                    <td data-label="allitem">{{$megadeals[0]['allitem']}}</td>
                    <td data-label="Price">{{$megadeals[0]['price']}}</td>
                    <td data-label="Discount">{{$megadeals[0]['discount']}}</td>
                    <td data-label="Megadeal Discount">{{$megadeals[0]['megadealdiscount']}}</td>
                    <td data-label="Dealtime">{{$megadeals[0]['dealtime']}}</td>
                    <td data-label="Action" id="megadeal-btn">
                        <a href="{{url('/')}}/removefrommegadeal/{{$megadeals[0]['deal_id']}}">Remove from Megadeals</a>
                    </td>
                  </tr>
                  @foreach (array_slice($megadeals, 1, sizeof($megadeals)) as $allitem)
                  <tr>
                    <td scope="row" data-label="Id">{{$allitem['deal_id']}}</td>
                    <td data-label="allitem">{{$allitem['allitem']}}</td>
                    <td data-label="Price">{{$allitem['price']}}</td>
                    <td data-label="Discount">{{$allitem['discount']}}</td>
                    <td data-label="Megadeal Discount">{{$allitem['megadealdiscount']}}</td>
                    <td data-label="Dealtime">{{$allitem['dealtime']}}</td>
                    <td data-label="Action" id="megadeal-btn">
                        <a href="{{url('/')}}/removefrommegadeal/{{$allitem['deal_id']}}">Remove from Megadeals</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                @endif
              </table>
        </div>
    </div>
@endsection
