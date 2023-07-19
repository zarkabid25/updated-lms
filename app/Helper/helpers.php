<?php

use Illuminate\Support\Facades\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

if( !function_exists( 'compressImagePHP' ) ) {
    function compressImagePHP( $request, $key ) : string
    {
        if(is_array($request) ){
            $image = $request[ $key ];

        } else {
            $image = $request->file( $key );
        }

        $imageHashedName = $image->hashName();

        $imgExplodedName = explode( ".", $imageHashedName );

//        $publicPath = public_path( 'images' ) . DIRECTORY_SEPARATOR ;
        $image->move(public_path('images'), $imgExplodedName[ 0 ] . '.' . $imgExplodedName[ 1 ]);
//        $img = Image::make( $image )->save( $publicPath . $imgExplodedName[ 0 ] . '.' . $imgExplodedName[ 1 ] );
//
//        $img->backup();
//
//        $img->resize( 200, null, function( $constraint ) {
//            $constraint->aspectRatio();
//            $constraint->upsize();
//        } )->save( $publicPath . $imgExplodedName[ 0 ] . '-thumbs200.' . $imgExplodedName[ 1 ] );
//        $img->reset();
//
//        $img->destroy();

        return $imgExplodedName[ 0 ] . '.' . $imgExplodedName[ 1 ];
    }
}

if( !function_exists( 'uploadVid' ) ) {
    function uploadVid($request, $key){
        if(is_array($request) ){
            $file = $request[ $key ];
        } else {
            $file = $request->file( $key );
        }

        $filename = $file->getClientOriginalName();
        $path = public_path( 'videos' ) . DIRECTORY_SEPARATOR;
        $file->move($path, $filename);
        return $filename;
    }
}

if( !function_exists( 'notification' ) ) {
    function notification($userID, $title, $description, $role, $p_id)
    {
        $res = (new \App\Models\Notification())->store($userID, $title, $description, $role, $p_id);
        return $res;
    }
}
