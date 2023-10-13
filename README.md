"Poems - Ahmer Gondal" is a dynamic web application designed for poetry enthusiasts to share their creative works. This platform not only allows for poetry submission but also engages users with its real-time features and interactive design.
Features
•	Real-time UTC Clock: Upon entering the site, users are presented with a real-time clock that displays the time in UTC, updated every second.
•	Interactive UI Elements: The site includes an interactive section with lorem ipsum text. A click collapses this section with smooth animation, ensuring user engagement.
•	Poem Submission Form: At the heart of the application is the poem submission form. It requires user details and an original poem, implementing input validation for names and phone numbers to uphold data integrity. Proper error messages are displayed for invalid inputs.
•	AJAX Integration: The form submits data to the server asynchronously using AJAX, preventing page reloads and ensuring a smooth user experience.
•	Server-side Processing: The server-side script, crafted in PHP, manages the POST request from the form. Utilizing PHPMailer, it's configured to send structured emails containing the user's submitted information and poem, assuming the correct settings in 'email_config.php'.
•	Immediate User Feedback: Users receive immediate feedback via an alert on successful form submission or errors, which presents an area for potential improvement.
Areas for Improvement
•	Feedback Mechanism: The current alert system for form submission feedback could be enhanced for a more comprehensive user experience.
•	Poem Management: The application lacks details on how submitted poems are stored, managed, or displayed to users, suggesting an opportunity for further development.
Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.
Please make sure to update tests as appropriate.

