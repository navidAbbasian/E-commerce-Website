<?php

namespace App\Containers\AppSection\Carousel\Enums;

enum CarouselTypeEnum: string
{
    case BestSelling = 'best_selling';
    case Newest = 'newest';
    case MostVisited = 'most_visited';
    case RecentVisit = 'recent_visit';
    case Category = 'category';
}
