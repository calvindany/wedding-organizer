INSERT INTO `tb_catalogues` (`pk_tb_catalogue`, `product_name`, `description`, `image`, `price`, `fk_tb_user`, `created_date`, `updated_date`) VALUES (NULL, 'Product Name 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://parador-hotels.com/_next/image?url=https%3A%2F%2Fbackend.parador-hotels.com%2Fwp-content%2Fuploads%2F2023%2F09%2FApa-yang-Dimaksud-dengan-Wedding-Package.webp&w=1920&q=75', '1000000', '1', current_timestamp(), current_timestamp());

INSERT INTO `tb_orders` (`pk_tb_order`, `name`, `email`, `phone_number`, `wedding_date`, `status`, `created_date`, `updated_date`) VALUES ('922f786a-47f0-4e04-adfe-8e18faf56f26', 'Calvin Dany', 'calvin@mail.com', '08918291098', '2024-06-21', 'Requested', current_timestamp(), current_timestamp());