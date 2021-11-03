# Laravel, Inertia ( Vue3 ), Tailwind CSS

## Additional packages

1. composer require php-ffmpeg/php-ffmpeg

Video upload process

fill out form ( don't let submit until data is set )

on submit loader with precentage of completion

backend => handle request and dispatch a
    StoreVideo ( Job ) to save the file
        and when

        Dispatch job to create thumbnail ( this one changes the "video_completed" property )



Video

    -title
    -description
    -private
    -user_id
    -file_id

File

    -path
    -name
    -is_processed