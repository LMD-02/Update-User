const content = {
    init() {
        this.focusInput();
        this.openSelect();
        this.updatePhone();
        this.updateQuality();
        this.uploadAvatar();
    },

    focusInput() {
        $('.input-item input').focus(function () {
            let $this = $(this);
            $this.parent().attr('style','border: 1px solid #008f79;box-shadow: 0 0 0 4px #cce9e4;');
        }).blur(function () {{
            let $this = $(this);
            $this.parent().attr('style','border: 1px solid #ccc;box-shadow: none;');
        }});

        $('.input-item textarea').focus(function () {
            let $this = $(this);
            $this.parent().attr('style','border: 1px solid #008f79;box-shadow: 0 0 0 4px #cce9e4;');
        }).blur(function () {{
            let $this = $(this);
            $this.parent().attr('style','border: 1px solid #ccc;box-shadow: none;');
        }});
    },
    openSelect() {
        $('.selected-country select').change(function () {
            let $region = $('.selected-region'),
                $city = $('.selected-city');
            $region.css('display','flex');
            $region.find('select').change(function () {
                $city.css('display','flex');
            });
        });
    },
    uploadAvatar() {
        $('.js-upload-avatar').click(function () {
            let $this = $(this);
            $this.parent().find('.js-input-upload-avatar').click();
        });
        $('.js-input-upload-avatar').change(function () {
            let $this = $(this);
            let file = $this[0].files[0];
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                let $avatar = $('.js-edit-avatar img');
                $avatar.attr('src',reader.result);
            };
        });
    },
    updatePhone(){
        $('.input-phone span').click(function () {
            let $this = $(this),
                $input = $this.parent().find('input');
            $input.prop('disabled',false);
        });
    },
    updateQuality(){
        $().ready(function () {
            let $textara = $('.area-item textarea'),
                $length = $textara.val().length,
                $count = $textara.parent().find('span');
            $count.text($length + "/255");
        })
        $('.area-item textarea').keyup(function () {
            let $this = $(this),
                $count = $this.parent().find('span'),
                $value = $this.val();
            // if($value.length >= 255){
            //     $this.prop('disabled',true);
            // }
            $count.text($value.length + "/255");

        });
    },


}

export default content;
