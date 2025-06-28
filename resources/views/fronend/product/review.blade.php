<div id="review" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <div cl ass="review-popup-wrapper">
            <div class="panel-head review-star">Đánh giá sản phẩm</div>
            <div class="panel-body">
                <div class="product-preview">
                    <span class="image img-scaledown"><img src="{{ asset('storage/' . $product->thumbnail->file_path) }}"
                            alt="Xiaomi Redmi Note 14 Pro Plus"></span>
                    <div class="product-title uk-text-center">{{ $product->name }}</div>
                    <div class="popup-rating uk-clearfix uk-text-center">
                        <div class="rate uk-clearfix ">
                            <input type="radio" id="star5" name="rate" class="rate" value="5" />
                            <label for="star5" title="Tuyệt vời">5 stars</label>
                            <input type="radio" id="star4" name="rate" class="rate" value="4" />
                            <label for="star4" title="Hài lòng">4 stars</label>
                            <input type="radio" id="star3" name="rate" class="rate" value="3" />
                            <label for="star3" title="Bình thường">3 stars</label>
                            <input type="radio" id="star2" name="rate" class="rate" value="2" />
                            <label for="star2" title="Tạm được">2 stars</label>
                            <input type="radio" id="star1" name="rate" class="rate" value="1" />
                            <label for="star1" title="Không thích">1 star</label>
                        </div>
                        <div class="rate-text uk-hidden">
                            Không thích
                        </div>
                    </div>
                    <div class="review-form">
                        <div action="" class="uk-form form">
                            <div class="form-row">
                                <textarea name="" id="" class="review-textarea"
                                    placeholder="Hãy chia sẻ cảm nhận của bạn về sản phẩm..."></textarea>
                            </div>
                            <div class="form-row">
                                <div class="uk-flex uk-flex-middle">
                                    <div class="gender-item uk-flex uk-flex-middle">
                                        <input type="radio" name="gender" class="gender" value="Nam"
                                            id="male">
                                        <label for="male">Nam</label>
                                    </div>
                                    <div class="gender-item uk-flex uk-flex-middle">
                                        <input type="radio" name="gender" class="gender" value="Nữ"
                                            id="femail">
                                        <label for="femail">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-grid uk-grid-medium">
                                <div class="uk-width-large-1-2">
                                    <div class="form-row">
                                        <input type="text" name="fullname" value="" class="review-text"
                                            placeholder="Nhập vào họ tên">
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2">
                                    <div class="form-row">
                                        <input type="text" name="phone" value="" class="review-text"
                                            placeholder="Nhập vào số điện thoại">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <input type="text" name="email" value="" class="review-text"
                                    placeholder="Nhập vào email">
                            </div>
                            <div class="uk-text-center">
                                <button type="submit" value="send" class="btn-send-review" name="create">Hoàn
                                    tất</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
