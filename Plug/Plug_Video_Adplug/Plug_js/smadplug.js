if(typeof DPlayer == 'function'){
    window.smadplug = function (myVideo,myParam) {

        var adend = function(){
            document.getElementById("preVideo").parentNode.removeChild(document.getElementById("preVideo"));
            document.getElementById("myVideo").style.display = 'block';
            myVideo.play();
            ad.destroy()
        }
        var adskip = function(){
            window.open(myParam.ad.pre.link);
            adend();
        }
        if (myParam.ad && myParam.ad.pre && myParam.ad.pre.url) {
            document.getElementById("preVideo").style.display = 'block';
            document.getElementById("myVideo").style.display = 'none';
            var ad = new DPlayer({
                container: document.getElementById('preVideo'),
                theme: '#4C8FE8',//进度条颜色
                volume: 1.0,//音量
                autoplay: true,//自动播放(注意这里是自动播放的)//与前置HTML广告共用时需要关闭
                video: {
                    url: myParam.ad.pre.url,//广告视频地址
                },
            });
            var skip = document.createElement('div');
            skip.onclick = adskip;
            skip.style.cssText = "position:absolute;right:16px;top:16px;width:100px;height:32px;line-height:32px;text-align:center;background:rgba(255,255,255,.5);color:#fff;border:1px #fff solid;border-radius:8px;display:block";
            skip.innerHTML = "跳过广告";
            document.getElementById('preVideo').append(skip);
            ad.on('timeupdate', function () {
                if (ad.video.currentTime > '15') {//视频时间，单位’秒‘，建议减1秒
                    adend();
                }
            });
            ad.on('ended', function () {
                adend();
            });
            ad.on('seeked',function () {
                window.open(myParam.ad.pre.link);
            })
        }

        if (myParam.ad && myParam.ad.pause && myParam.ad.pause.url) {
            var pausead = document.createElement('a');
            pausead.target = '_blank';
            pausead.href = myParam.ad.pause.link;
            pausead.style.cssText = "position:absolute;left:50%;top:50%;transform: translate(-50%, -50%);display:none";
            var pauseimg = document.createElement('img');
            pauseimg.src = myParam.ad.pause.url;
            pausead.append(pauseimg);
            document.getElementById('myVideo').append(pausead);
            myVideo.on('pause', function () {
                pausead.style.display = "block";
            })
            myVideo.on('play', function () {
                pausead.style.display = "none";
            })
        }
    }
}else{


}

