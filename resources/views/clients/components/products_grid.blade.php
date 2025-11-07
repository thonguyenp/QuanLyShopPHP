<div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-categories mb-4">
                        <h4>Products Categories</h4>
                        <ul class="list-unstyled">
                            <li>
                                <div class="categories-item">
                                    <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>
                                        Accessories</a>
                                    <span>(3)</span>
                                </div>
                            </li>
                            <li>
                                <div class="categories-item">
                                    <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>
                                        Electronics & Computer</a>
                                    <span>(5)</span>
                                </div>
                            </li>
                            <li>
                                <div class="categories-item">
                                    <a href="#" class="text-dark"><i
                                            class="fas fa-apple-alt text-secondary me-2"></i>Laptops & Desktops</a>
                                    <span>(2)</span>
                                </div>
                            </li>
                            <li>
                                <div class="categories-item">
                                    <a href="#" class="text-dark"><i
                                            class="fas fa-apple-alt text-secondary me-2"></i>Mobiles & Tablets</a>
                                    <span>(8)</span>
                                </div>
                            </li>
                            <li>
                                <div class="categories-item">
                                    <a href="#" class="text-dark"><i
                                            class="fas fa-apple-alt text-secondary me-2"></i>SmartPhone & Smart TV</a>
                                    <span>(5)</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    {{-- Price range --}}
                    <div class="price mb-4">
                        <h4 class="mb-2">Price Range</h4>

                        <div class="range-slider">
                            <div class="slider-track"></div>
                            <div class="slider-range" id="sliderRange"></div>

                            <input type="range" id="minRange" min="0" max="500" value="100" step="1" oninput="updateDualRange()">
                            <input type="range" id="maxRange" min="0" max="500" value="400" step="1" oninput="updateDualRange()">
                        </div>

                        <div class="mt-2">
                            <span>From: $<span id="minValue">100</span></span>
                            <span class="mx-2">—</span>
                            <span>To: $<span id="maxValue">400</span></span>
                        </div>
                    </div>



                    <div class="additional-product mb-4">
                        <h4>Additional Products</h4>
                        <div class="additional-product-item">
                            <input type="radio" class="me-2" id="Categories-1" name="Categories-1" value="Beverages">
                            <label for="Categories-1" class="text-dark"> Accessories</label>
                        </div>
                        <div class="additional-product-item">
                            <input type="radio" class="me-2" id="Categories-2" name="Categories-1" value="Beverages">
                            <label for="Categories-2" class="text-dark"> Electronics & Computer</label>
                        </div>
                        <div class="additional-product-item">
                            <input type="radio" class="me-2" id="Categories-3" name="Categories-1" value="Beverages">
                            <label for="Categories-3" class="text-dark"> Laptops & Desktops</label>
                        </div>
                        <div class="additional-product-item">
                            <input type="radio" class="me-2" id="Categories-4" name="Categories-1" value="Beverages">
                            <label for="Categories-4" class="text-dark"> Mobiles & Tablets</label>
                        </div>
                        <div class="additional-product-item">
                            <input type="radio" class="me-2" id="Categories-5" name="Categories-1" value="Beverages">
                            <label for="Categories-5" class="text-dark"> SmartPhone & Smart TV</label>
                        </div>
                    </div>
                    <div class="featured-product mb-4">
                        <h4 class="mb-3">Featured products</h4>
                        <div class="featured-product-item">
                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                <img src="img/product-5.png" class="img-fluid rounded" alt="Image">
                            </div>
                            <div>
                                <h6 class="mb-2">Camera Leance</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <a href="#" class="btn btn-primary px-4 py-3 rounded-pill w-100">Vew More</a>
                        </div>
                    </div>
                </div>