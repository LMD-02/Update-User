<div id="user-content">
    <div id="edit-profile" class="edit-profile js-content-item ">
        <form id="form-edit-profile" enctype="multipart/form-data" action="{{route('updateProfile')}}">
            @csrf
            <div class="title">
                <h1>Edit Profile</h1>
            </div>
            <div class="title-photo">
                <h3>Profile photo</h3>
            </div>
            <div class="profile-photo">
                <div  class="avatar js-edit-avatar">
                    <img src="{{asset('images/avatars/'.$user->avatar)}}" alt="">
                </div>
                <div class="info">
                    <p class="description">
                        Clear frontal face photos are an important way for buyers and sellers to learn about each other.
                    </p>
                    <div class="btn-upload">
                        <input type="file" name="avatar" id="avatar" accept="image/png, image/jpeg, image/gif" class="js-input-upload-avatar" >
                        <button type="button" class="btn btn-primary js-upload-avatar">Upload photo</button>
                    </div>
                </div>
            </div>
            <div class="title-public">
                <h3>Public profile</h3>
            </div>
            <div class="profile-info">
                <div class="input-item">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" value="{{$user->username}}">
                </div>
                <div class="input-item">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" placeholder="First Name" value="{{$user->first_name}}">
                </div>
                <div class="input-item">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="{{$user->last_name}}">
                </div>
                <div class="input-item area-item">
                    <label for="last_name">Bio </label>
                    <textarea name="bio" id="bio" rows="6s" placeholder="Bio">{{$user->bio}}</textarea>
                    <span>0/255</span>
                </div>
            </div>
            <div class="title-location">
                <h3>Location</h3>
            </div>
            <div class="location-info">
                <div class="selected-country js-selected-item">
                    <label for="country">
                        Country
                    </label>
                    <select  name="country" id="country">
                        <option selected value="{{$user->country}}">{{$user->country}}</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Canada">Canada</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Indonesia">Indonesia</option>
                    </select>
                </div>
                <div class="selected-region js-selected-item">
                    <label for="region">
                        Region
                    </label>
                    <select name="region" id="region">
                        <option selected value="{{$user->region}}">{{$user->region}}</option>
                        <option value="hanoi">Hà nội</option>
                        <option value="tuyenquang">Tuyên Quang</option>
                        <option value="quangninh">Quảng ninh</option>
                    </select>
                </div>
                <div class="selected-city js-selected-item">
                    <label for="city">
                        City
                    </label>
                    <select name="city" id="city">
                        <option selected value="{{$user->city}}">{{$user->city}}</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Canada">Canada</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Indonesia">Indonesia</option>
                    </select>
                </div>
            </div>
            <div class="title-private">
                <h3>Private information</h3>
            </div>
            <div class="private-info">
                <div class="text">
                    <img src="https://mweb-cdn.karousell.com/build/lock-outlined-12sm0z41ew.svg" alt="icon">
                    We do not share this information with other users unless explicit permission is given by you.
                </div>
                <div class="input-item">
                    <label for="email">Email </label>
                    <input type="text" name="email" id="email" placeholder="Email" value="{{$user->email}}">
                </div>
                <div class="input-item input-phone">
                    <label for="phone">Phone </label>
                    <input type="text" name="phone" disabled id="phone" placeholder="Phone number" value="{{$user->phone}}">
                    <span>Update</span>
                </div>
                <div class="selected-gender js-selected-item">
                    <label for="gender">
                        Gender
                    </label>
                    <select name="gender" id="gender">
                        @if($user->gender === 0)
                            <option selected value="0">Male</option>
                            <option  value="1">Female</option>
                            <option  value="2">hide</option>
                        @elseif($user->gender === 1)
                            <option  value="0">Male</option>
                            <option selected value="1">Female</option>
                            <option  value="2">hide</option>

                        @elseif($user->gender === 2)
                            <option selected value="2">hide</option>
                            <option  value="0">Male</option>
                            <option  value="1">Female</option>
                        @endif
                    </select>
                </div>
                <div class="input-item">
                    <label for="birthday">Birthday </label>
                    <input type="date" name="birthday" id="birthday" placeholder="Birthday" value="{{$user->birthday}}">
                </div>
            </div>
            <div class="save-profile">
                <button id="btn-submit-edit-profile" type="submit" class="btn btn-success">Save Changes</button>
            </div>
        </form>
    </div>
    <div id="change-password" class="change-password js-content-item ">
        <form id="form-change-password" action="{{route('updatePassword')}}">
            @csrf
            <div class="title">
                <h1>Change Password</h1>
            </div>
            <div class="body">
                <div class="input-item">
                    <label for="old_password">Old Password </label>
                    <input type="password" name="old_password" id="old_password" placeholder="Old Password">
                </div>
                <div class="input-item">
                    <label for="new_password">New Password </label>
                    <input type="password" name="new_password" id="new_password" placeholder="New Password">
                </div>
                <div class="input-item">
                    <label for="confirm_password">Confirm Password </label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                </div>
            </div>
            <div class="save-password">
                <button id="btn-submit-change-password" class="btn btn-success">Save Changes</button>
            </div>
        </form>
    </div>
    <div id="notification" class="notification js-content-item ">
        <form id="form-notification" action="{{route('updateNotification')}}">

            @csrf
            <div class="transaction">
                <div class="title">
                    <h3>Transactions</h3>
                    <p>These are important updates - no spams, we promise. You may be notified via SMS, Push Notification or email.</p>
                </div>
                <div class="body">
                    <div class="item">
                        <div class="title">
                            More notification settings
                        </div>
                        <div class="list-option">
                            <div class="item-option">
                                @if($user->notification['notification-like-listing'] === true)
                                <input type="checkbox" name="notification-like-listing" id="notification-like-listing" checked>
                                @else
                                    <input type="checkbox" name="notification-like-listing" id="notification-like-listing">
                                @endif
                                <label for="notification-like-listing">Likes on my listings</label>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            Channels
                        </div>
                        <div class="list-option">
                            <div class="item-option">
                                @if($user->notification['notification-email'] === true)
                                    <input type="checkbox" name="notification-email" id="notification-email" checked>
                                @else
                                    <input type="checkbox" name="notification-email" id="notification-email" >
                                @endif
                                <label for="notification-email">Email</label>
                            </div>
                            <div class="item-option">
                                @if($user->notification['notification-mobile-app'] === true)
                                    <input type="checkbox" name="notification-mobile-app" id="notification-mobile-app" checked>
                                @else
                                    <input type="checkbox" name="notification-mobile-app" id="notification-mobile-app" >
                                @endif
                                <label for="notification-mobile-app">Mobile app push notification</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="interested">
                <div class="title">
                    <h3>Listings you're interested in</h3>
                    <div class="title-option">
                        @if($user->notification['interested-all-noti'] === true)
                            <input type="checkbox" name="interested-all-noti" id="interested-all-noti" checked>
                        @else
                            <input type="checkbox" name="interested-all-noti" id="interested-all-noti" >
                        @endif
                        <label for="interested-all-noti">All Notifications</label>
                    </div>
                    <p>Price drops on listings you liked and new saved search results</p>
                </div>
                <div class="body">
                    <div class="item">
                        <div class="title">
                            Channels
                        </div>
                        <div class="list-option">
                            <div class="item-option">
                                @if($user->notification['interested-email'] === true)
                                    <input type="checkbox" name="interested-email" id="interested-email" checked>
                                @else
                                    <input type="checkbox" name="interested-email" id="interested-email" >
                                @endif
                                <label for="interested-email">Email</label>
                            </div>
                            <div class="item-option">
                                @if($user->notification['interested-mobile-app'] === true)
                                    <input type="checkbox" name="interested-mobile-app" id="interested-mobile-app" checked>
                                @else
                                    <input type="checkbox" name="interested-mobile-app" id="interested-mobile-app" >
                                @endif
                                <label for="interested-mobile-app">Mobile app push notification</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="community">
                <div class="title">
                    <h3>From community</h3>
                    <div class="title-option">
                        @if($user->notification['community-all-noti'] === true)
                            <input type="checkbox" name="community-all-noti" id="community-all-noti" checked>
                        @else
                            <input type="checkbox" name="community-all-noti" id="community-all-noti" >
                        @endif
                        <label for="community-all-noti">All Notifications</label>
                    </div>
                    <p>New followers and updates on activity in your groups (likes, mentions, invitations)</p>
                </div>
                <div class="body">
                    <div class="item">
                        <div class="title">
                            More notification settings
                        </div>
                        <div class="list-option">
                            <div class="item-option">
                                @if($user->notification['community-new-post'] === true)
                                    <input type="checkbox" name="community-new-post" id="community-new-post" checked>
                                @else
                                    <input type="checkbox" name="community-new-post" id="community-new-post" >
                                @endif
                                <label for="community-new-post">
                                    New posts and listings in my Groups</label>
                            </div>
                            <div class="item-option">
                                @if($user->notification['community-recommended-group'] === true)
                                    <input type="checkbox" name="community-recommended-group" id="community-recommended-group" checked>
                                @else
                                    <input type="checkbox" name="community-recommended-group" id="community-recommended-group" >
                                @endif
                                <label for="community-recommended-group">Recommended Groups</label>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            Channels
                        </div>
                        <div class="list-option">
                            <div class="item-option">
                                @if($user->notification['community-email'] === true)
                                    <input type="checkbox" name="community-email" id="community-email" checked>
                                @else
                                    <input type="checkbox" name="community-email" id="community-email" >
                                @endif
                                <label for="community-email">Email</label>
                            </div>
                            <div class="item-option">
                                @if($user->notification['community-mobile-app'] === true)
                                    <input type="checkbox" name="community-mobile-app" id="community-mobile-app" checked>
                                @else
                                    <input type="checkbox" name="community-mobile-app" id="community-mobile-app" >
                                @endif
                                <label for="community-mobile-app">Mobile app push notification</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-app">
                <div class="title">
                    <h3>From ...</h3>
                    <div class="title-option">
                        @if($user->notification['all-noti'] === true)
                            <input type="checkbox" name="all-noti" id="my-app-all-noti" checked>
                        @else
                            <input type="checkbox" name="all-noti" id="my-app-all-noti" >
                        @endif
                        <label for="my-app-all-noti">All Notifications</label>
                    </div>
                    <p>Recommendations based on your activity, and updates on Carousell's latest features and promotions</p>
                </div>
                <div class="body">
                    <div class="item">
                        <div class="title">
                            More notification settings
                        </div>
                        <div class="list-option">
                            <div class="item-option">
                                @if($user->notification['adverting-partners'] === true)
                                    <input type="checkbox" name="adverting-partners" id="my-app-adverting-partners" checked>
                                @else
                                    <input type="checkbox" name="adverting-partners" id="my-app-adverting-partners" >
                                @endif
                                <label for="my-app-adverting-partners">
                                    Advertising from our partners</label>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            Channels
                        </div>
                        <div class="list-option">
                            <div class="item-option">
                                @if($user->notification['email'] === true)
                                    <input type="checkbox" name="email" id="my-app-email" checked>
                                @else
                                    <input type="checkbox" name="email" id="my-app-email" >
                                @endif
                                <label for="my-app-email">Email</label>
                            </div>
                            <div class="item-option">
                                @if($user->notification['mobile-app'] === true)
                                    <input type="checkbox" name="mobile-app" id="my-app-mobile-app" checked>
                                @else
                                    <input type="checkbox" name="mobile-app" id="my-app-mobile-app" >
                                @endif
                                <label for="my-app-mobile-app">Mobile app push notification</label>
                            </div>
                            <div class="item-option">
                                @if($user->notification['sms'] === true)
                                    <input type="checkbox" name="sms" id="my-app-sms" checked>
                                @else
                                    <input type="checkbox" name="sms" id="my-app-sms" >
                                @endif

                                <label for="my-app-sms">SMS</label>
                            </div>
                            <div class="item-option">
                                @if($user->notification['chat'] === true)
                                    <input type="checkbox" name="chat" id="my-app-chat" checked>
                                @else
                                    <input type="checkbox" name="chat" id="my-app-chat" >
                                @endif

                                <label for="my-app-chat">Chat</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="data-privacy-setting" class="data-privacy-setting js-content-item ">
        <form id="form-privacy-setting" action="{{route('updateSetting')}}">
            @csrf
            <div class="title">
                <h1>Data & Privacy settings</h1>
            </div>
            <div class="body">
                <div class="item">
                    <h3>Privacy preferences</h3>
                    <p>
                        Carousell may share information that do not constitute personal data with our our advertising and analytics partners. This contributes to Carousell’s business sustainability in the long run, so that we can keep our basic features free for all users. Thank you for your support.
                        <a>More info</a>
                    </p>
                    <div class="title-option">
                        @if($user->setting['privacy-interested'] === true)
                            <input type="checkbox" name="privacy-interested" id="privacy-interested" checked>
                        @else
                            <input type="checkbox" name="privacy-interested" id="privacy-interested" >
                        @endif
                        <label for="privacy-interested">Interest-based information</label>
                    </div>
                    <div class="title-option">
                        @if($user->setting['privacy-location'] === true)
                            <input type="checkbox" name="privacy-location" id="privacy-location" checked>
                        @else
                            <input type="checkbox" name="privacy-location" id="privacy-location" >
                        @endif
                            <label for="privacy-location">
                            Location-based information</label>
                    </div>
                    <div class="title-option">
                        @if($user->setting['privacy-demographic'] === true)
                            <input type="checkbox" name="privacy-demographic" id="privacy-demographic" checked>
                        @else
                            <input type="checkbox" name="privacy-demographic" id="privacy-demographic" >
                        @endif
                        <label for="privacy-demographic">Demographic information</label>
                    </div>
                </div>
                <div class="item">
                    <h3>Advertising preferences</h3>
                    <p>
                        If you turn off the settings below, you'll still see the same number of ads, but they may be less relevant to you.
                    </p>
                    <div class="title-option">
                        <input type="checkbox" name="advertising-interested" id="advertising-interested" checked>
                        <label for="advertising-interested">Interest-based information</label>
                    </div>
                    <p>Carousell may use your information to serve you more relevant content. <a>More info</a></p>
                </div>
                <div class="item">
                    <h3>Survey preferences</h3>
                    <div class="title-option">
                        @if($user->setting['survey-participate'] === true)
                            <input type="checkbox" name="survey-participate" id="survey-participate" checked>
                        @else
                            <input type="checkbox" name="survey-participate" id="survey-participate" >
                        @endif
                        <label for="survey-participate">
                            Participate in external surveys</label>
                    </div>
                </div>
            </div>
{{--            <div class="save-data-privacy">--}}
{{--                <button id="btn-submit-data-privacy" class="btn btn-success">Save Changes</button>--}}
{{--            </div>--}}
        </form>
    </div>
</div>
