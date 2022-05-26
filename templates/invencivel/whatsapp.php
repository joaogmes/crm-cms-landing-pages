<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style type="text/css">
    @keyframes blink {

    from,
    to {
        color: transparent
    }

    50% {
        color: black
    }
}

@-moz-keyframes blink {

    from,
    to {
        color: transparent
    }

    50% {
        color: black
    }
}

@-webkit-keyframes blink {

    from,
    to {
        color: transparent
    }

    50% {
        color: black
    }
}

@-ms-keyframes blink {

    from,
    to {
        color: transparent
    }

    50% {
        color: black
    }
}

@-o-keyframes blink {

    from,
    to {
        color: transparent
    }

    50% {
        color: black
    }
}

.chatpopup-widget * {
    box-sizing: border-box
}

.chatpopup-widget {
    position: fixed;
    bottom: 12px;
    z-index: 999999;
    display: flex;
    flex-direction: column
}

.chatpopup-widget__body {
    margin-bottom: 10px;
    min-width: 300px;
    max-width: 340px;
    display: none;
    margin-left: 12px
}

.chatpopup-widget__body-header {
    padding: 15px;
    font-size: 15px;
    line-height: 22px;
    text-align: center;
    border-radius: 4px 4px 0 0;
    position: relative
}

.chatpopup-widget-close {
    position: absolute;
    top: -40px;
    width: 30px;
    height: 30px;
    border-radius: 4px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    user-select: none
}

.chatpopup-support-persons {
    background-color: #fff;
    padding: 15px;
    box-shadow: 0 50px 30px rgba(0, 0, 0, 0.1);
    border-radius: 0 0 4px 4px;
    max-height: 370px;
    overflow-y: auto;
    min-height: 20px
}

.chatpopup-support-person {
    display: flex;
    margin-bottom: 15px;
    border: 1px solid #F5F5F5;
    cursor: pointer
}

.chatpopup-support-person__img {
    width: 70px;
    height: 70px;
    margin-right: 15px;
    position: relative
}

.chatpopup-support-person__img img {
    width: 100%;
    border-radius: 0
}

.chatpopup-support-person__status {
    background-color: red;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    position: absolute;
    bottom: 0;
    right: 0
}

.chatpopup-support-person__status--avail {
    background-color: #00c853
}

.chatpopup-support-person__status--not-avail {
    background-color: #ffd600
}

.chatpopup-support-person__meta {
    display: flex;
    flex-direction: column;
    justify-content: center
}

.chatpopup-support-person__name,
.chatpopup-support-person__title {
    line-height: 20px
}

.chatpopup-support-person__name {
    font-size: 16px;
    font-weight: 700;
    color: #706F6F
}

.chatpopup-support-person__title {
    color: #706F6F
}

.chatpopup-welcome-msg {
    padding: 5px 15px;
    border-radius: 0 0 4px 4px
}

.chatpopup-custom-offer {
    margin: 10px 0
}

.chatpopup-custom-offer img {
    width: 100%
}

.chatpopup-widget__trigger {
    padding: 6px 14px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 15px;
    display: inline-block;
    user-select: none;
    display: flex;
    align-items: center
}

.chatpopup-gdpr {
    font-size: 14px;
    border: 1px solid transparent;
    padding-left: 15px;
    background-color: #fff
}

.chatpopup-gdpr.error {
    border: 1px solid red
}

a.chatpopup-whatsapp-button {
    padding: 6px 20px !important;
    text-align: center !important;
    text-decoration: none !important;
    margin-right: 5px !important;
    border-radius: 2px !important;
    cursor: pointer !important;
    font-size: 15px !important;
    outline: none !important;
    display: inline-block !important
}

.chatpopup-blinking-cursor {
    font-weight: 100;
    font-size: 15px;
    color: #2E3D48;
    -webkit-animation: 1s blink step-end infinite;
    -moz-animation: 1s blink step-end infinite;
    -ms-animation: 1s blink step-end infinite;
    -o-animation: 1s blink step-end infinite;
    animation: 1s blink step-end infinite
}

.chatpopup-input-wrapper {
    display: flex;
    align-items: center;
    padding: 5px 10px;
    background: #fff;
    box-shadow: 0 50px 30px rgba(0, 0, 0, 0.1);
    border-radius: 0 0 4px 4px;
    border-top: 1px solid #ccc
}

.chatpopup-input-wrapper input {
    flex: 1;
    height: 40px;
    background: transparent !important;
    border: none !important;
    box-shadow: none !important
}

.chatpopup-input-icon {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 30px;
    cursor: pointer;
    margin: 0 10px
}

.chatpopup-input-icon svg {
    width: 100%;
    height: auto
}

.chatpopup_jwi {
    display: inline-block;
    position: fixed;
    bottom: 12px;
    filter: drop-shadow(0px 0px 15px rgba(0, 0, 0, .1));
    outline: none;
    z-index: 99999
}

.chatpopup-icon-close svg {
    width: 14px
}

.chatpopup-icon-whatsapp {
    line-height: 0 !important;
    margin-right: 5px
}

.chatpopup-icon-whatsapp svg {
    width: 16px
}
        .chatpopup-widget-close,
        .chatpopup-widget__body-header,
        .chatpopup-widget__trigger,
        .chatpopup-welcome-msg {
            background-color: #1fad00;
            color: #ffffff;
        }

        .chatpopup-widget {
            right: 12px;
            align-items: flex-end;
        }

        .chatpopup-widget-close {
            right: 0;
        }

        .chatpopup_jwi {
            right: 12px;
        }

        .chatpopup-welcome-msg {
            border: 1px solid #ccc;
            color: #999;
            background: #fff;
            line-height: 1em;
            padding: 8px 15px 5px 10px;
            position: relative;
        }

        .chatpopup-welcome-msg:before {
            content: "\1F4AC";
            display: inline;
            top: 0;
            position: relative;
            font-size: 1.1em;
            margin-right: 5px;
        }

        .chatpopup-welcome-msg:after {
            content: "|";
            position: absolute;
            left: 32px;
            top: 6px;
            animation: cursor 2.5s infinite;
        }

        @keyframes cursor {
            0% {
                opacity: 1;
            }

            25% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            75% {
                opacity: 0;
            }
        }
    </style>

<div class="chatpopup-widget">
        <div class="chatpopup-widget__body"  style="display: none;">
            <div class="chatpopup-widget__body-header">
                <span class="chatpopup-icon-close chatpopup-widget-close">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" fill="currentColor">
                        <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
                    </svg> </span> 
                Ecrivez-nous sur WhatsApp. </div>
            <div class="chatpopup-support-persons">
                <div class="chatpopup-support-person" data-chatpopup-person="" data-chatpopup-number="22892971128" data-chatpopup-message="Salut j'ai visité votre ce lien sur votre site https://tochat.be/click-to-chat/2020/03/08/bootstrap-whatsapp-chat-button-auto-link-my-whatsapp et j'ai besoin de plus d'information...">
                    <div class="chatpopup-support-person__img">
                        <img src="https://www.svgrepo.com/show/70698/avatar.svg" alt="//">
                    </div>
                    <div class="chatpopup-support-person__meta">
                        <div class="chatpopup-support-person__name">Cesar Martin</div>
                        <div class="chatpopup-support-person__title">Ventes et assistance</div>
                    </div>
                </div>
            </div>
            <div class="chatpopup-input-wrapper">
                <span class="chatpopup-blinking-cursor" style="display: none;">|</span>
                <input type="text" id="chatpopup-type-and-chat-input" placeholder="Salut, je suis César ... discutons" name="message_to_send">
                <div class="chatpopup-input-icon">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/langfr-800px-WhatsApp.svg.png" width="30" alt="//">
                </div>
            </div>
        </div>
        <div class="chatpopup-widget__trigger">
            <span class="chatpopup-icon-whatsapp">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
                </svg> </span>
            Comment vous aidez? </div>
    </div>
<script type="text/javascript">
    
    $(".chatpopup-icon-close").on('click', function(event) {
        event.preventDefault();
        $(".chatpopup-widget__body").hide(400);
    });

    $(".chatpopup-widget__trigger").on('click', function(event) {
        event.preventDefault();
        $(".chatpopup-widget__body").show(400);
    });
    
    $(".chatpopup-input-icon").on('click', function(event) {
        event.preventDefault();
        sendMessage();
    });

    $("input[name=message_to_send]").on('keydown', function(event) {
        console.log(event.which);
        if(event.which == 13){
            sendMessage();
        }
    });

    function sendMessage() {
        var number = "22892971128";
        var message = $("input[name=message_to_send]").val();

        if (message === undefined || message === "") {
            message = "Salut j'ai visité votre ce lien sur votre site" + " "+ location.href + " "+ "et j'ai besoin de plus d'information...".replace(" ", "%20");
        } else{
            message += " " + location.href;
        }

        var url = "https://api.whatsapp.com/send?phone="+ number +"&text="+ message;

        $("input[name=message_to_send]").val("");
        window.open(url, '_blank');
    }

</script>