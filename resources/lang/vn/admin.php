<?php

return [
    'menu'       => [
        'dashboard'                => 'Bảng Điều Khiển',
        'admin_users'              => 'Quản Trị Viên',
        'users'                    => 'Người Dùng',
        'admin_user_notifications' => 'Thông Báo Hệ Thống',
        'user_notifications'       => 'Thông Báo Người Dùng',
        'site_configuration'       => 'Cấu Hình',
        'log_system'               => 'Nhật Ký Hệ Thống',
        'images'                   => 'Hình Ảnh',
        'articles'                 => 'Bài Viết',
        'customers'                => 'Khách Hàng',
        'employees'                => 'Nhân Viên',
        'products'                 => 'Sản Phẩm',
        'imports'                  => 'Nhập Kho',
        'exports'                  => 'Xuất Kho',
        'categories'               => 'Danh Mục',
        'subcategories'            => 'Danh Mục Con',
        'units'                    => 'Đơn vị'
    ],
    'breadcrumb' => [
        'dashboard'                => 'Bảng Điều Khiển',
        'admin_users'              => 'Quản Trị Viên',
        'users'                    => 'Người Dùng',
        'admin_user_notifications' => 'Thông Báo Hệ Thống',
        'user_notifications'       => 'Thông Báo Người Dùng',
        'site_configuration'       => 'Cấu Hình',
        'log_system'               => 'Nhật Ký Hệ Thống',
        'images'                   => 'Hình Ảnh',
        'articles'                 => 'Bài Viết',
        'customers'                => 'Khách Hàng',
        'employees'                => 'Nhân Viên',
        'products'                 => 'Sản Phẩm',
        'imports'                  => 'Nhập Kho',
        'exports'                  => 'Xuất Kho',
        'categories'               => 'Danh Mục',
        'subcategories'            => 'Danh Mục Con',
        'create_new'               => 'Create New',
        'units'                    => 'Đơn vị'
    ],
    'messages'   => [
        'general' => [
            'update_success' => 'Cập nhật thông tin thành công !!!',
            'create_success' => 'Tạo mới dữ liệu thành công !!!',
            'delete_success' => 'Xóa dữ liệu thành công !!!',
        ],
        'errors'  => [
            'params_invalid' => 'Tham số không hợp lệ !!!',
            'code_invalid'   => 'Code này đã được sử dụng !!!'
        ],
    ],
    'errors'     => [
        'general'  => [
            'save_failed' => 'Failed To Save. Please contact with developers',
        ],
        'requests' => [
            'me' => [
                'email'    => [
                    'required' => 'Email Required',
                    'email'    => 'Email is not valid',
                ],
                'password' => [
                    'min' => 'Password need at least 6 letters',
                ],
            ],
        ],
    ],
    'pages'      => [
        'common'                   => [
            'label'   => [
                'page'               => 'Trang',
                'actions'            => 'Thao tác',
                'is_enabled'         => 'Trạng thái',
                'is_enabled_true'    => 'Enabled',
                'is_enabled_false'   => 'Disabled',
                'search_results'     => 'Tổng cộng: :count kết quả.',
                'select_province'    => 'Chọn một Tỉnh/Thành',
                'select_district'    => 'Chọn một Quận/Huyện',
                'all'                => 'Tất cả',
                'select_category'    => 'Chọn một Danh mục',
                'select_subcategory' => 'Chọn một Danh mục con',
                'select_unit'        => 'Lựa chọn Đơn vị',
                'select_employee'    => 'Lựa chọn Nhân viên',
                'select_customer'    => 'Lựa chọn Khách hàng',
                'select_store'       => 'Lựa chọn Cửa hàng',
                'select_product'     => 'Lựa chọn Sản phẩm',
                'select_option'      => 'Lựa chọn Option',
                'standard_option'    => 'Tiêu chuẩn',
            ],
            'buttons' => [
                'create'          => 'Tạo mới',
                'edit'            => 'Sửa',
                'save'            => 'Lưu',
                'delete'          => 'Xóa',
                'cancel'          => 'Hủy',
                'back'            => 'Quay lại',
                'close'           => 'Đóng',
                'add'             => 'Thêm',
                'view'            => 'Xem',
                'preview'         => 'Xem trước',
                'print'           => 'In',
                'forgot_password' => 'Send Me Email!',
                'reset_password'  => 'Reset Password',
            ],
        ],
        'auth'                     => [
            'buttons'  => [
                'sign_in'         => 'Sign In',
                'forgot_password' => 'Send Me Email!',
                'reset_password'  => 'Reset Password',
            ],
            'messages' => [
                'remember_me'     => 'Remember Me',
                'please_sign_in'  => 'Sign in to start your session',
                'forgot_password' => 'I forgot my password',
                'reset_password'  => 'Please enter your e-mail address and new password',
            ],
        ],
        'site-configurations'      => [
            'columns' => [
                'locale'                => 'Locale',
                'name'                  => 'Name',
                'title'                 => 'Title',
                'keywords'              => 'Keywords',
                'description'           => 'Descriptions',
                'ogp_image_id'          => 'OGP Image',
                'twitter_card_image_id' => 'Twitter Card Image',
            ],
        ],
        'articles'                 => [
            'columns' => [
                'slug'               => 'Slug',
                'title'              => 'Title',
                'keywords'           => 'Keywords',
                'description'        => 'Description',
                'content'            => 'Content',
                'cover_image_id'     => 'Cover Image',
                'locale'             => 'Locale',
                'is_enabled'         => 'Active',
                'publish_started_at' => 'Publish Started At',
                'publish_ended_at'   => 'Publish Ended At',
                'is_enabled_true'    => 'Enabled',
                'is_enabled_false'   => 'Disabled',

            ],
        ],
        'user-notifications'       => [
            'columns' => [
                'user_id'       => 'User',
                'category_type' => 'Category',
                'type'          => 'Type',
                'data'          => 'Data',
                'locale'        => 'Locale',
                'content'       => 'Content',
                'read'          => 'Read',
                'read_true'     => 'Read',
                'read_false'    => 'Unread',
                'sent_at'       => 'Sent At',
            ],
        ],
        'admin-user-notifications' => [
            'columns' => [
                'user_id'       => 'User',
                'category_type' => 'Category',
                'type'          => 'Type',
                'data'          => 'Data',
                'locale'        => 'Locale',
                'content'       => 'Content',
                'read'          => 'Read',
                'read_true'     => 'Read',
                'read_false'    => 'Unread',
                'sent_at'       => 'Sent At',
            ],
        ],
        'images'                   => [
            'columns' => [
                'url'                    => 'URL',
                'title'                  => 'Title',
                'is_local'               => 'is Local',
                'entity_type'            => 'EntityType',
                'entity_id'              => 'ID',
                'file_category_type'     => 'Category',
                's3_key'                 => 'S3 Key',
                's3_bucket'              => 'S3 Bucket',
                's3_region'              => 'S3 Region',
                's3_extension'           => 'S3 Extension',
                'media_type'             => 'Media Type',
                'format'                 => 'Format',
                'file_size'              => 'File Size',
                'width'                  => 'Width',
                'height'                 => 'Height',
                'has_alternative'        => 'has Alternative',
                'alternative_media_type' => 'Alternative Media Type',
                'alternative_format'     => 'Alternative Format',
                'alternative_extension'  => 'Alternative Extension',
                'is_enabled'             => 'Status',
                'is_enabled_true'        => 'Enabled',
                'is_enabled_false'       => 'Disabled',
            ],
        ],
        'admin-users'              => [
            'columns' => [
                'name'             => 'Name',
                'email'            => 'Email',
                'password'         => 'Password',
                're_password'      => 'Confirm Password',
                'locale'           => 'Locale',
                'profile_image_id' => 'Avatar',
                'permissions'      => 'Permissions',
            ],
        ],
        'users'                    => [
            'columns' => [
                'name'                 => 'Name',
                'email'                => 'Email',
                'password'             => 'Password',
                'locale'               => 'Locale',
                'remember_token'       => 'Remember Token',
                'api_access_token'     => 'Api Access Token',
                'profile_image_id'     => 'Profile Image',
                'last_notification_id' => 'Last Notification Id',
            ],
        ],
        'customers'                => [
            'columns' => [
                'name'            => 'Họ và tên',
                'address'         => 'Địa chỉ',
                'telephone'       => 'Điện thoại',
                'avatar_image_id' => 'Ảnh đại diện',
                'province_id'     => 'Tỉnh/Thành phố',
                'district_id'     => 'Quận/Huyện',
            ],
        ],
        'employees'                => [
            'columns' => [
                'name'            => 'Họ và tên',
                'address'         => 'Địa chỉ',
                'telephone'       => 'Điện thoại',
                'avatar_image_id' => 'Ảnh đại diện',
                'province_id'     => 'Tỉnh/Thành phố',
                'district_id'     => 'Quận/Huyện',
            ],
        ],
        'products'                 => [
            'columns' => [
                'code'           => 'Mã sản phẩm',
                'name'           => 'Tên sản phẩm',
                'category_id'    => 'Danh mục',
                'subcategory_id' => 'Danh mục con',
                'unit_id'        => 'Đơn vị (lẻ)',
                'unit2_id'       => 'Đơn vị (sỉ)',
                'unit_exchange'  => 'Tỷ lệ',
                'descriptions'   => 'Mô tả',
                'quantity'       => 'Số lượng',
                'import_price'   => 'Giá nhập',
                'export_price'   => 'Giá xuất kho',
                'price'          => 'Giá',
            ],
            'options' => [
                'change_unit2_title'   => 'Đơn vị (Bán sỉ)',
                'create_option_title'  => 'Tạo Option mới',
                'create_option_button' => 'Tạo mới',
                'properties'           => 'Thuộc tính',
            ]
        ],
        'logs'                     => [
            'columns' => [
                'user_name' => 'User Name',
                'email'     => 'Email',
                'action'    => 'Action',
                'table'     => 'Table',
                'record_id' => 'Record ID',
                'query'     => 'Query',
            ],
        ],
        'imports'                  => [
            'columns' => [
                'code'         => 'Code',
                'times'        => 'Thời gian',
                'notes'        => 'Ghi chú',
                'employee_id'  => 'Nhân viên',
                'creator_id'   => 'Người tạo',
                'total_amount' => 'Tổng giá trị',
            ],
            'modal'   => [
                'title'          => 'Nhập kho',
                'create_button'  => 'Thêm sản phẩm',
                'product_name'   => 'Sản phẩm',
                'product_option' => 'Option',
                'import_price'   => 'Giá nhập',
                'quantity'       => 'Số lượng',
                'unit'           => 'Đơn vị'
            ]
        ],
        'exports'                  => [
            'columns' => [
                'employee_id'    => 'Nhân viên',
                'customer_id'    => 'Khách hàng',
                'store_id'       => 'Cửa hàng',
                'times'          => 'Thời gian',
                'discount'       => 'Chiết khấu',
                'discount_unit'  => 'Đơn vị',
                'total_amount'   => 'Tổng giá trị',
                'amount_payable' => 'Cần thanh toán',
                'notes'          => 'Ghi chú',
                'creator_id'     => 'Người tạo',
            ],
            'modal'   => [
                'title'          => 'Xuất kho',
                'create_button'  => 'Thêm sản phẩm',
                'product_name'   => 'Sản phẩm',
                'product_option' => 'Option',
                'export_price'   => 'Giá xuất',
                'quantity'       => 'Số lượng',
                'unit'           => 'Đơn vị',
                'new_customer'   => 'Khách Hàng Mới'
            ],
            'view'    => [
                'delivery_bill'  => 'Hóa Đơn Thanh Toán',
                'code'           => 'Mã số',
                'customer'       => 'Khách hàng',
                'address'        => 'Địa chỉ',
                'telephone'      => 'Điện thoại',
                'stt'            => 'STT',
                'products'       => 'Sản phẩm',
                'options'        => 'Thông tin sản phẩm',
                'unit'           => 'Đơn vị',
                'quantity'       => 'Số lượng',
                'price'          => 'Giá',
                'total'          => 'Tổng cộng',
                'total_amount'   => 'Tổng cộng',
                'discount'       => 'Chiết khấu',
                'payable_amount' => 'Cần thanh toán',
                'notes'          => 'Ghi chú',
                'biller'         => 'Người lập hóa đơn',
                'receiver'       => 'Người nhận',
                'sign_and_name'  => '(Ký và ghi rõ họ tên)',
            ]
        ],
        'categories'               => [
            'columns' => [
                'name'  => 'Tên',
                'slug'  => 'Slug',
                'order' => 'Thứ tự',
                'notes' => 'Ghi chú',
            ],
        ],
        'subcategories'            => [
            'columns' => [
                'category_id' => 'Danh Mục Cha',
                'name'        => 'Tên',
                'slug'        => 'Slug',
                'order'       => 'Thứ tự',
                'notes'       => 'Ghi chú',
            ],
        ],
        /* NEW PAGE STRINGS */
    ],
    'roles'      => [
        'super_user' => 'Super User',
        'admin'      => 'Administrator',
        'employee'   => 'Employee'
    ],
];
