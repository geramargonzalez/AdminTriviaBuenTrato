<?php
// In bootstrap.php
// Configure::load('socialLogin', 'default');
return [
    // enabled  activa/desactiva el login mediante redes sociales
    'socialauth'  => [
        'enabled' => false,
        'loginUrl' => '/admin/users/login',
        'loginRedirect' => '/admin/articles/index',
        'userModel' => 'Users',
        'provider' => [
               'facebook' => [
                    'name' => 'facebook',
                    'applicationId' => '514187645770748',
                    'applicationSecret' => '53464731adb16ff0b68c1c4482dc9704',
                    'scope' => [
                        'email',
                    ],
                    'fields' => [
                        'email',
                        'first_name',
                        'picture.width(99999)',
                        'last_name'
                    ],
                ],
                'google' => [
                    'name' => 'google',
                    'applicationId' => '823069665689-krshja2vtk7le1bc45moq5l92h64f8is.apps.googleusercontent.com',
                    'applicationSecret' => 'bdrfV3RQFEtaZHsvT_3t5Muu',
                    'approval_prompt' => 'none',
                    'scope' => [
                        'https://www.googleapis.com/auth/userinfo.email',
                        'https://www.googleapis.com/auth/userinfo.profile'
                    ],  
                ],
               'twitter' => [
                    'name' => 'twitter',
                    'applicationId' => 's8vSIPszl0fNBVLIhIeZKrAJR',
                    'applicationSecret' => 'VBhIIdio82oTanHhFkBuV1H594zsazrlAujTXZ3UARYs6VeQFX',
                    'includeEmail' => true,
                     'fields' => [
                        'email',
                        'first_name',
                        'last_name',
                    ]
                ],
                'linkedin' => [
                    'name' => 'linkedin',
                    'applicationId' => '77fhpdtfh7bip7',
                    'applicationSecret' => 'FQvQOuiIYmQ7yjmP',
                     'scope' => [
                        'r_emailaddress',
                        'r_basicprofile',
                    ], 
                ],
                /*'instagram' => [
                    'name' => 'instagram',
                    'applicationId' => '225bb185658b457a9f056818ecabe296',
                    'applicationSecret' => '7fda1b34998049719f17cf0bbf499ed2',
                    'scope' => [
                        'basic',
                    ]
                ]*/

            ],
    ]
];