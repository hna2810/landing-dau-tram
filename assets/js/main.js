/**
 * Landing Page Tinh Dầu Tràm Home Care - Main JavaScript
 *
 * @package LXLanding
 */

(function () {
  'use strict';

  // Merge runtime CONFIG from WordPress wp_localize_script
  var wpConfig = (typeof window !== 'undefined' && window.CONFIG) ? window.CONFIG : {};
  var CONFIG = {
    hotline: wpConfig.hotline || '0989890779',
    zalo: wpConfig.zalo || '0989890779',
    logo: wpConfig.logo || 'https://cdn.hstatic.net/themes/200001066686/1001439050/14/logo.png',
    images: Object.assign({
      hero: '', pain1: '', pain2: '', pain3: '', pain4: '', pain: '',
      ben1: '', ben2: '', ben3: '', ben4: '', benefit: '',
      ing1: '', ing2: '', ing3: '', ing4: '', ingredients: '', handheld: '', certificate: '',
      step1: '', step2: '', step3: '',
      feedback1: '', feedback2: '', feedback3: '', feedback4: '', service: '', offer: ''
    }, wpConfig.images || {}),
    showImageNotes: typeof wpConfig.showImageNotes !== 'undefined' ? wpConfig.showImageNotes : true,
    orderEndpoint: wpConfig.orderEndpoint || '',
    unitPrice: wpConfig.unitPrice || 49000,
    oldPrice: wpConfig.oldPrice || 87000,
    countdownHours: wpConfig.countdownHours || 2
  };

  var $ = function (s) { return document.querySelector(s); };

  // 1. Logo, hotline, Zalo bindings
  (function () {
    var logoEl = $('#logo');
    if (logoEl && CONFIG.logo) {
      var img = new Image();
      img.alt = 'Home Care';
      img.onload = function () {
        logoEl.innerHTML = '';
        logoEl.appendChild(img);
      };
      img.src = CONFIG.logo;
    }

    var callBtn = $('#callBtn');
    if (callBtn) callBtn.href = 'tel:' + CONFIG.hotline;

    var zaloBtn = $('#zaloBtn');
    if (zaloBtn) zaloBtn.href = 'https://zalo.me/' + CONFIG.zalo;

    var footPhone = $('#footPhone');
    if (footPhone) {
      footPhone.href = 'tel:' + CONFIG.hotline;
      footPhone.textContent = CONFIG.hotline.replace(/(\d{4})(\d{3})(\d+)/, '$1 $2 $3');
    }
  })();

  // 2. Image slots: fill from CONFIG.images or keep/hide placeholder notes
  document.querySelectorAll('[data-img]').forEach(function (slot) {
    if (slot.classList.contains('filled')) {
      return; // Already rendered by PHP on server
    }
    var key = slot.dataset.img;
    var url = CONFIG.images[key];
    if (!url) {
      if (!CONFIG.showImageNotes) {
        slot.classList.add('hide');
      }
      return;
    }
    var titleEl = slot.querySelector('b');
    var img = new Image();
    img.alt = titleEl ? titleEl.textContent : 'Tinh dầu tràm Home Care';
    img.loading = 'lazy';
    img.onload = function () {
      slot.innerHTML = '';
      slot.appendChild(img);
      slot.classList.add('filled');
    };
    img.src = url;
  });

  // 3. Scroll Reveal animation
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          e.target.classList.add('in');
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.12 });

    document.querySelectorAll('.reveal').forEach(function (el, i) {
      el.style.transitionDelay = (i % 4) * 80 + 'ms';
      io.observe(el);
    });

    // Count-up stats
    var countIO = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        var el = e.target;
        var target = +el.dataset.count;
        var start = performance.now();
        var tick = function (t) {
          var p = Math.min((t - start) / 1400, 1);
          el.textContent = Math.round(target * (1 - Math.pow(1 - p, 3))).toLocaleString('vi-VN');
          if (p < 1) requestAnimationFrame(tick);
        };
        requestAnimationFrame(tick);
        countIO.unobserve(el);
      });
    }, { threshold: 0.5 });

    document.querySelectorAll('[data-count]').forEach(function (el) {
      countIO.observe(el);
    });
  } else {
    document.querySelectorAll('.reveal').forEach(function (el) {
      el.classList.add('in');
    });
  }

  // 4. Countdown (persisted per visitor, restarts when ends)
  (function () {
    var key = 'tram_cd_end';
    var span = CONFIG.countdownHours * 3600e3;
    var end;
    try {
      end = +localStorage.getItem(key);
    } catch (e) {}

    if (!end || end < Date.now()) {
      end = Date.now() + span;
      try {
        localStorage.setItem(key, end);
      } catch (e) {}
    }

    var pad = function (n) { return String(n).padStart(2, '0'); };
    var cdHList = document.querySelectorAll('#cdHour, #cd-h');
    var cdMList = document.querySelectorAll('#cdMin, #cd-m');
    var cdSList = document.querySelectorAll('#cdSec, #cd-s');

    if (cdHList.length && cdMList.length && cdSList.length) {
      var tick = function () {
        var left = end - Date.now();
        if (left <= 0) {
          end = Date.now() + span;
          try {
            localStorage.setItem(key, end);
          } catch (e) {}
          left = span;
        }
        var hStr = pad(Math.floor(left / 3600e3));
        var mStr = pad(Math.floor(left / 60e3) % 60);
        var sStr = pad(Math.floor(left / 1e3) % 60);
        cdHList.forEach(function (el) { el.textContent = hStr; });
        cdMList.forEach(function (el) { el.textContent = mStr; });
        cdSList.forEach(function (el) { el.textContent = sStr; });
      };
      tick();
      setInterval(tick, 1000);
    }
  })();

  // 5. Sticky buy bar
  (function () {
    var sticky = $('#sticky');
    var hero = $('.hero');
    if (!sticky || !hero || !('IntersectionObserver' in window)) return;

    var heroVisible = true;
    var orderVisible = false;
    var update = function () {
      sticky.classList.toggle('show', !heroVisible && !orderVisible);
    };

    new IntersectionObserver(function (entries) {
      heroVisible = entries[0].isIntersecting;
      update();
    }).observe(hero);

    var tail = new Set();
    var orderTarget = $('#dat-hang');
    if (orderTarget) {
      new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            tail.add(e.target);
          } else {
            tail.delete(e.target);
          }
        });
        orderVisible = tail.size > 0;
        update();
      }, { threshold: 0.05 }).observe(orderTarget);
    }

    document.querySelectorAll('.final, footer').forEach(function (el) {
      new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            tail.add(e.target);
          } else {
            tail.delete(e.target);
          }
        });
        orderVisible = tail.size > 0;
        update();
      }).observe(el);
    });
  })();

  // 6. CTA tracking hook
  document.querySelectorAll('[data-cta]').forEach(function (a) {
    a.addEventListener('click', function () {
      if (window.fbq) fbq('track', 'InitiateCheckout');
      if (window.ttq) ttq.track('ClickButton');
    });
  });

  // 7. Order form submission handling
  (function () {
    var form = $('#orderForm');
    if (!form) return;

    var rules = {
      fName: function (v) { return v.trim().length >= 2; },
      fPhone: function (v) { return /^0\d{9}$/.test(v.replace(/[\s.-]/g, '')); },
      fAddr: function (v) { return v.trim().length >= 6; }
    };

    Object.keys(rules).forEach(function (id) {
      var el = $('#' + id);
      if (el) {
        el.addEventListener('input', function (e) {
          e.target.parentElement.classList.remove('err');
        });
      }
    });

    var isSubmitting = false;

    form.addEventListener('submit', async function (e) {
      e.preventDefault();
      if (isSubmitting) return;

      var ok = true;
      for (var id in rules) {
        if (!rules.hasOwnProperty(id)) continue;
        var el = $('#' + id);
        if (!el) continue;
        var bad = !rules[id](el.value);
        el.parentElement.classList.toggle('err', bad);
        if (bad && ok) {
          el.focus();
          ok = false;
        }
      }
      if (!ok) return;

      isSubmitting = true;
      var btn = $('#submitBtn');
      if (btn) {
        btn.disabled = true;
        btn.textContent = 'Đang gửi đơn hàng...';
      }

      var qty = 1;
      var nameVal = $('#fName') ? $('#fName').value.trim() : '';
      var phoneVal = $('#fPhone') ? $('#fPhone').value.replace(/[\s.-]/g, '') : '';
      var addrVal = $('#fAddr') ? $('#fAddr').value.trim() : '';

      var order = {
        product: 'Tinh dầu tràm giữ ấm cho bé 30ml',
        name: nameVal,
        phone: phoneVal,
        address: addrVal,
        quantity: qty,
        total: CONFIG.unitPrice * qty,
        freeship: true,
        source: location.href,
        createdAt: new Date().toISOString()
      };

      if (CONFIG.orderEndpoint) {
        try {
          await fetch(CONFIG.orderEndpoint, {
            method: 'POST',
            mode: 'no-cors',
            headers: { 'Content-Type': 'text/plain;charset=utf-8' },
            body: JSON.stringify(order)
          });
        } catch (err) {
          console.warn('Gửi đơn thất bại sang webhook Google Sheet:', err);
        }
      }

      if (window.fbq) fbq('track', 'Purchase', { value: order.total, currency: 'VND' });
      if (window.ttq) ttq.track('CompletePayment', { value: order.total, currency: 'VND' });

      var sName = $('#sName');
      var sPhone = $('#sPhone');
      if (sName) sName.textContent = order.name;
      if (sPhone) sPhone.textContent = order.phone;

      var formBody = $('#formBody');
      var formSuccess = $('#formSuccess');
      if (formBody) formBody.style.display = 'none';
      if (formSuccess) formSuccess.classList.add('show');
    });
  })();

  // 8. Stock + social proof toasts
  (function () {
    var left = 17;
    var stockLeft = $('#stockLeft');
    var stockBar = $('#stockBar');
    var setStock = function () {
      if (stockLeft) stockLeft.textContent = left;
      if (stockBar) stockBar.style.width = (100 - left) + '%';
    };
    setStock();

    var names = ['Mẹ Thu', 'Mẹ Hương', 'Mẹ Linh', 'Mẹ Trang', 'Mẹ Mai', 'Mẹ Phương', 'Mẹ Nga', 'Mẹ Hạnh', 'Mẹ Vy', 'Mẹ Thảo'];
    var places = ['Hà Nội', 'TP.HCM', 'Hải Phòng', 'Đà Nẵng', 'Nghệ An', 'Thanh Hóa', 'Bắc Ninh', 'Cần Thơ', 'Nam Định', 'Quảng Ninh'];
    var pick = function (a) { return a[Math.floor(Math.random() * a.length)]; };
    var toast = $('#toast');
    var toastText = $('#toastText');

    if (toast && toastText) {
      var show = function () {
        toastText.innerHTML = '<b>' + pick(names) + '</b> (' + pick(places) + ') vừa đặt <b>tinh dầu tràm</b><br><small>' + (Math.floor(Math.random() * 9) + 1) + ' phút trước</small>';
        toast.classList.add('show');
        setTimeout(function () { toast.classList.remove('show'); }, 4500);
        if (left > 4 && Math.random() < 0.5) {
          left--;
          setStock();
        }
      };
      setTimeout(function () {
        show();
        setInterval(show, 14000);
      }, 6000);
    }
  })();

  // 9. Vertical 9:16 Video Player Handler
  (function () {
    var playBtn = $('#usagePlayBtn');
    var videoBox = $('#usageVideoBox');
    var container = $('#usageVideoContainer');
    var poster = $('#usageVideoPoster');

    if (!playBtn || !videoBox || !container) return;

    playBtn.addEventListener('click', function () {
      var ytId = videoBox.getAttribute('data-yt-id');
      var videoUrl = videoBox.getAttribute('data-video-url');

      if (ytId) {
        container.innerHTML = '<iframe src="https://www.youtube.com/embed/' + ytId + '?autoplay=1&playsinline=1&rel=0" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
        container.classList.add('playing');
        playBtn.style.display = 'none';
        if (poster) poster.style.display = 'none';
      } else if (videoUrl) {
        container.innerHTML = '<video src="' + videoUrl + '" playsinline controls autoplay style="width:100%;height:100%;object-fit:cover;"></video>';
        container.classList.add('playing');
        playBtn.style.display = 'none';
        if (poster) poster.style.display = 'none';
      } else {
        var toast = $('#toast');
        var toastText = $('#toastText');
        if (toast && toastText) {
          toastText.innerHTML = '🎬 <b>Video 9:16 đang được cập nhật!</b><br><small>Mẹ hãy tham khảo 3 bước sử dụng chi tiết ngay bên cạnh nhé ❤️</small>';
          toast.classList.add('show');
          setTimeout(function () { toast.classList.remove('show'); }, 4000);
        }
      }
    });
  })();

})();

