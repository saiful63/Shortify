## About Shortify

Shortify is a url shortner.Anyone who want to use it,they need register a account in [Shortify](https://urlshortner.projectbysaiful.com/). After successful login user short their long url.

## Features

1. User can share shorted url to others.
2. User can get information the number of hit into short url.
3. Edit and delete facility for url.


## Development strategy
1. Registration and login: Custom registration and login logic is applied.Any unauthenticated user cannot access where they have no permission.Authentiacation is maintained through middleware.User request is validated,if user give wrong credential,remain field empty and provide other instead of url then it show error message.Separate request is created to handle request.
2. Url shorting process: Specified a unique string to each url.Generated new url through this string.For checking uniqueness of string,used do-while loop.
3. Redirection: After shorting url,when user click on it, it will redrect to long url and increase hit count.Js function Redirect() is used for this purpose.When url is clicked by another,hit count is increased.
4. Manage url: Edit and delete url using resource controller.In the time of deletion process ,if anyone click on cancel, it will not delete url.Js function delData() is used for this purpose.
