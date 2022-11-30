// cordova.plugins.notification.local.schedule({
//     title: 'The big survey',
//     text: 'Are you a fan of RB Leipzig?',
//     attachments: ['file://img/rb-leipzig.jpg'],
//     actions: [
//         { id: 'yes', title: 'Yes' },
//         { id: 'no',  title: 'No' }
//     ]
// });

export default function notification() { 
    cordova.plugins.notification.local.schedule({
        title: 'The big survey',
        text: 'Are you a fan of RB Leipzig?',
        attachments: ['file://img/rb-leipzig.jpg'],
        actions: [
            { id: 'yes', title: 'Yes' },
            { id: 'no',  title: 'No' }
        ]
    });
    // navigator.notification.alert(
    //     'You are the winner!',  // message
    //     alertDismissed,         // callback
    //     'Game Over',            // title
    //     'Done'                  // buttonName
    // );
    return
 }