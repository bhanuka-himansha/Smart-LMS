<?php

namespace App\Helpers;

use App\Models\Review;
use Aws\CloudFront\CloudFrontClient;
use DateTime;

class CoreHelper
{
    function generateCloudFrontSignedUrl($resourceKey)
    {
        $cfClient = new CloudFrontClient([
            'region' => env('AWS_DEFAULT_REGION'),
            'version' => 'latest',
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);

        $expiry = time() + 300; // 5 minutes from now

        $signedUrl = $cfClient->getSignedUrl([
            'url' => env('AWS_CLOUDFRONT_URL') . '/' . $resourceKey,
            'expires' => $expiry,
            'private_key' => base_path(env('CLOUDFRONT_PRIVATE_KEY_PATH')),
            'key_pair_id' => env('CLOUDFRONT_KEY_PAIR_ID'),
        ]);

        return $signedUrl;
    }

    public static function ratingFinder($id)
    {
        $total = 0;
        $count = 0;
        $reviews = Review::where('course_id', $id)->get();

        if ($reviews->count() > 0) {
            foreach ($reviews as $review) {
                $total += $review->rating;
                $count++;
            }
            $rating = $total / $count;
        } else {
            $rating = 0;
        }

        // Cast to float and round to one decimal place
        $roundedRating = round((float) $rating, 1);
        return $roundedRating;
    }
}
