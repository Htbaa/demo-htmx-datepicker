# Simple htmx datepicker example

This example shows a very basic and quickly put together datepicker built only with htmx. Please note that this example isn't optimized for accessibility, so don't copy as-is.

## How does it work?

The user clicks the _Pick a date_ button which triggers a request to render the datepicker from `/datepicker.php`.

The datepicker consists of two navigational buttons (previous and next month) that allows switching months. Clicking one of these buttons triggers a request to `/datepicker.php` but with a `date` added to the query string. The script uses this date to render the days for the given month and update the previous/next buttons.

Selecting a date is done by clicking one of the day-buttons. Doing so will result in a request to `/datepicker.php` with a `picked_date`. This request will only return a pre filled input for the date and uses `hx-swap-oob` to replace the date input-element in the form. Since the target has been set to the `#datepicker-widget` but there's no content the widget gets removed.

## Demo

![Short demonstration of the datepicker](/demo.gif "htmx Datepicker")
