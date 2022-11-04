<?php
if (isset($user)) {

    // Configure here
    $admins = ['mfwalton91', 'GoD_Dor', 'Trazan', 'sevbanano'];
    $secretKey = 'e124e748-94f7-44c9-afc5-fe8c84a88952';
    $encodedChatId = '58PKr';
    $siteDomain = 'banfaucet.com'; // without https or http and www
    // END

    $siteUserFullName = $user['username'];
    $siteUserProfileUrl = site_url('admin/users/details/' . $user['id']);
    $permissions = [];
    $permissionsDisplay = '[]';
    // You can also change colors an images here
    if (!in_array($siteUserFullName, $admins)) {
        $permissions = [];
        $permissionsDisplay = "[]";
        $siteUserFullName .= '';
        $siteUserAvatarUrl = site_url('/assets/images/chat/user_chat.png');
        $siteUserFullNameColor = '#ffffff';
        if ($user['level'] >= 25) {
            $siteUserFullNameColor = '#D65DB1';
        }
        if ($user['level'] >= 50) {
            $siteUserFullNameColor = '#0313fc';
        }
        if ($user['level'] >= 75) {
            $siteUserFullNameColor = '#B05C00';
        }
        if ($user['level'] >= 100) {
            $siteUserFullNameColor = '#4E8397';
        }
        if ($user['level'] >= 125) {
            $siteUserFullNameColor = '#C34A36';
        }
        if ($user['level'] >= 150) {
            $siteUserFullNameColor = '#fbceb1';
        }
        if ($user['level'] >= 175) {
            $siteUserFullNameColor = '#008b8b';
        }
        if ($user['level'] >= 200) {
            $siteUserFullNameColor = '#00efff';
        }
    } else {
        $permissions = ['ban', 'delete'];
        $permissionsDisplay = "['ban', 'delete']";
        $siteUserFullName .= ' ';
        $siteUserAvatarUrl = site_url('/assets/images/staff.png');
        $siteUserFullNameColor = '#ffff00';
    }
    $siteUserExternalId = $user['id'];


    if ($siteDomain != 'demo.com') {
?>
        <style>
            .chatbro_message_name {
                font-family: Quicksand, sans-serif !important;
            }
        </style>
        <script id="chatBroEmbedCode">
            function ChatbroLoader(chats, async) {
                async = !1 !== async;
                var params = {
                        embedChatsParameters: chats instanceof Array ? chats : [chats],
                        lang: navigator.language || navigator.userLanguage,
                        needLoadCode: 'undefined' == typeof Chatbro,
                        embedParamsVersion: localStorage.embedParamsVersion,
                        chatbroScriptVersion: localStorage.chatbroScriptVersion
                    },
                    xhr = new XMLHttpRequest;
                xhr.withCredentials = !0;
                xhr.onload = function() {
                    eval(xhr.responseText);
                };
                xhr.onerror = function() {
                    console.error('Chatbro loading error')
                };
                xhr.open('GET', '//www.chatbro.com/embed.js?' +
                    btoa(unescape(encodeURIComponent(JSON.stringify(params)))), async);
                xhr.send();
            }
            /* Chatbro Widget Embed Code End */
            ChatbroLoader({
                encodedChatId: '<?= $encodedChatId ?>',
                siteDomain: '<?= $siteDomain ?>',
                siteUserExternalId: '<?= $siteUserExternalId ?>',
                siteUserFullName: '<?= $siteUserFullName ?>',
                siteUserAvatarUrl: '<?= $siteUserAvatarUrl ?>',
                siteUserProfileUrl: '<?= $siteUserProfileUrl ?>',
                siteUserFullNameColor: '<?= $siteUserFullNameColor ?>',
                permissions: <?= $permissionsDisplay ?>,
                signature: '<?= md5($siteDomain . '' . $siteUserExternalId . '' . $siteUserFullName . '' . $siteUserAvatarUrl . '' . $siteUserProfileUrl . '' . $siteUserFullNameColor . '' . implode('', $permissions) . '' . $secretKey) ?>'
            });
        </script>
<?php }
} ?>