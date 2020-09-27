@extends("template")
@section("title")
    Home
    @endsection
@section("mainContent")
<div id="wrapper">
    <div id="mainContent">
        <div id="leftWrapper">
            <div id="left">
                <div id="priceSortHolder">
                    <select id="priceSort" name="priceSort">
                        <option value="0">Sort by price</option>
                        <option value="ASC">Ascending</option>
                        <option value="DESC">Descending</option>
                    </select>
                    <!--<span class="fa fa-angle-down"></span>-->
                </div>
                <ul id="leftCategories">

                    @foreach($categories as $catItem)
                    <li  class="<?php if(isset($activeCategory) && $catItem->id == $activeCategory) { echo "activeCategoryLeftSide"; }?>"><a href="#" data-id="{{ $catItem->id }}">{{ $catItem->name }}<span class="fa fa-angle-right"></span></a></li>
                    @endforeach
                </ul>
                <div id="priceRange">
                    <label for="price">Price :</label><br/>
                    <input type="range" id="price" name="price" min="14" max="60"/>
                    <span id="priceValue"></span>
                </div>
            </div>
        </div>
        <div id="products">
            <div id="searchHolder">
                <span class="fa fa-search"></span>
                <input type="search" id="searchBtn" name="searchBtn" autocomplete="on" placeholder="Please search here..."/>
            </div>
            <div id="prod">
              <?php
                $i = 0;
                $resultLength = count($products);
                ?>
            @foreach($products as $product)
                  <?php
                      $i++;
                      $shouldOpen = ($i-1) % 4 == 0;
                      if(($i == 1) || $shouldOpen){
                          echo "<div class='prodRow'>";
                      }
                      ?>
                @component("partials.product", ["product" => $product])
                    @endcomponent
                      <?php
                      if($i % 4 == 0){
                          echo "</div>";
                      }
                      if(($resultLength % 4 != 0) && ($i == $resultLength)){
                          echo "</div>";
                      }
                      ?>
                @endforeach

            </div>
            <div id="paginationDiv">
                <ul id="pagination">
                    <?php
                    for($i = 0; $i < $paginationCount; $i++):
                    ?>
                    <li>
                        <a href="#" class="paginationLinks" data-limit="<?= $i ?>"><?= $i+1 ?></a>
                    </li>
                    <?php endfor;  ?>
                </ul>
            </div>
        </div>
    </div>
</div>
    @endsection

