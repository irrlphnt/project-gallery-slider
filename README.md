# Project Gallery Slider WordPress Plugin

A WordPress plugin that provides a Gutenberg block for displaying an ACF Gallery field as a Swiper slider.

## Requirements

- WordPress 6.0+
- PHP 7.4+
- Advanced Custom Fields (ACF) Pro
- Project custom post type with an ACF Gallery field

## Installation

1. Download the plugin ZIP file
2. Go to WordPress Admin > Plugins > Add New
3. Click "Upload Plugin" and select the downloaded ZIP file
4. Click "Install Now"
5. After installation, activate the plugin

## Usage

1. Ensure your Project post type has an ACF Gallery field (default field key: `gallery`)
2. Create or edit a post/page
3. Add the "Project – Gallery Slider" block from the media category
4. Configure the block settings:
   - Set the ACF Gallery field name if different from default
   - Adjust slider height (0 for auto)
   - Set autoplay delay (0 to disable)
   - Toggle navigation arrows visibility
   - Configure caption overlay:
     - Position (bottom, top, center)
     - Background color
     - Text color
     - Font size
     - Font family

## Block Settings

- **ACF Gallery field name**: The field key of your ACF Gallery field
- **Slider height**: Fixed height in pixels (0 for auto)
- **Autoplay delay**: Time between slides in milliseconds (0 to disable)
- **Show navigation arrows**: Toggle visibility of navigation arrows
- **Show caption overlay**: Toggle visibility of image captions
- **Caption Style**:
  - Position: Where to place the caption (bottom, top, center)
  - Background Color: Caption background color
  - Text Color: Caption text color
  - Font Size: Caption text size in pixels
  - Font Family: Custom font family for captions

## Notes

- The slider uses Swiper.js loaded from CDN
- Captions are pulled from image alt text or ACF fields
- The block is dynamic and updates with gallery changes
- Styles are responsive and work on all screen sizes

## Support

For support, please contact the plugin author through WordPress.org or create an issue in the repository.
