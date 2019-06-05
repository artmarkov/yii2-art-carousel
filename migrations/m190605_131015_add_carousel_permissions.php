<?php

use artsoft\db\PermissionsMigration;

class m190605_131015_add_carousel_permissions extends PermissionsMigration
{

    public function beforeUp()
    {
        $this->addPermissionsGroup('carouselManagement', 'Carousel Management');
    }

    public function afterDown()
    {
        $this->deletePermissionsGroup('carouselManagement');
    }

    public function getPermissions()
    {
        return [
            'carouselManagement' => [
                'links' => [
                    '/admin/carousel/*',
                    '/admin/carousel/default/*',
                ],
                'viewCarousels' => [
                    'title' => 'View Carousels',
                    'links' => [
                        '/admin/carousel/default/index',
                        '/admin/carousel/default/view',
                        '/admin/carousel/default/grid-sort',
                        '/admin/carousel/default/grid-page-size',
                    ],
                    'roles' => [
                        self::ROLE_AUTHOR,
                    ],
                ],
                'editCarousels' => [
                    'title' => 'Edit Carousels',
                    'links' => [
                        '/admin/carousel/default/update',
                    ],
                    'roles' => [
                        self::ROLE_AUTHOR,
                    ],
                    'childs' => [
                        'viewCarousels',
                    ],
                ],
                'createCarousels' => [
                    'title' => 'Create Carousels',
                    'links' => [
                        '/admin/carousel/default/create',
                    ],
                    'roles' => [
                        self::ROLE_AUTHOR,
                    ],
                    'childs' => [
                        'viewCarousels',
                    ],
                ],
                'deleteCarousels' => [
                    'title' => 'Delete Carousels',
                    'links' => [
                        '/admin/carousel/default/delete',
                        '/admin/carousel/default/bulk-delete',
                    ],
                    'roles' => [
                        self::ROLE_MODERATOR,
                    ],
                    'childs' => [
                        'viewCarousels',
                    ],
                ],
                'fullCarouselAccess' => [
                    'title' => 'Full Carousel Access',
                    'roles' => [
                        self::ROLE_MODERATOR,
                    ],
                ],                
            ],
        ];
    }

}
