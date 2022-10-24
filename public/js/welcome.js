'use strict';

(function() {
  function init() {
    var shepherd = setupShepherd();
    setTimeout(function() {
      shepherd.start();
    }, 400);
  }

  function setupShepherd() {
    var shepherd = new Shepherd.Tour({
      defaultStepOptions: {
        title: 'Selamat Datang',
        cancelIcon: {
          enabled: true
        },
        classes: 'class-1 class-2',
        scrollTo: {
          behavior: 'smooth',
          block: 'center'
        }
      },
      // This should add the first tour step
      steps: [
        {
          text: 'Selamat datang',
          attachTo: {
            element: '.hero-welcome',
            on: 'bottom'
          },
          buttons: [
            {
              action: function() {
                return this.cancel();
              },
              secondary: true,
              text: 'Keluar'
            },
            {
              action: function() {
                return this.next();
              },
              text: 'Selanjutnya'
            }
          ],
          id: 'welcome'
        }
      ],
      useModalOverlay: true
    });

    const element = document.createElement('p');
    element.innerText = 'Silahkan download manuall book di sini.';

    // These steps should be added via `addSteps`
    const steps = [
      {
        title: 'Manual Book',
        text: element,
        attachTo: {
          element: '.manual-book',
          on: 'bottom'
        },
        buttons: [
          {
            action: function() {
              return this.back();
            },
            secondary: true,
            text: 'Sebelumnya'
          },
          {
            action: function() {
              return this.next();
            },
            text: 'Selanjutnya'
          }
        ],
        id: 'including'
      }
    ];

    shepherd.addSteps(steps);



    const element1 = document.createElement('p');
    element1.innerText = 'Silahkan cek FAQ di sini.';

    // These steps should be added via `addSteps`
    const steps1 = [
      {
        title: 'FAQ',
        text: element1,
        attachTo: {
          element: '.faq',
          on: 'bottom'
        },
        buttons: [
          {
            action: function() {
              return this.back();
            },
            secondary: true,
            text: 'Sebelumnya'
          },
          {
            action: function() {
              return this.next();
            },
            text: 'Selesai'
          }
        ],
        id: 'including'
      }
    ];

    shepherd.addSteps(steps1);
    return shepherd;
  }

  function ready() {
    if (document.attachEvent ? document.readyState === 'complete' : document.readyState !== 'loading') {
      init();
    } else {
        if (tutorial == 'aaa') {
            document.addEventListener('DOMContentLoaded', init);
        }
    }
  }

  ready();
}).call(void 0);