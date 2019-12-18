<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public $table = 'searches';

    protected $fillable = [
        'id',
        'is_a_practice',
        'id_search',
        'region',
        'status',

        'date_start',
        'date_creation',
        'date_last_modification',
        'date_finalization',

        'id_user_creation',
        'id_user_last_modification',
        'id_user_finalization',

        // person alerts
        'is_lost_person',
        'is_contact_person',
        'name_person_alerts',
        'age_person_alerts',
        'phone_number_person_alerts',
        'address_person_alerts',

        // incident
        'municipality_last_place_seen',
        'date_last_place_seen',
        'zone_incident',
        'potential_route',
        'description_incident',

        // lost people
        'number_lost_people',
        'physical_condition_lost_people',

        // equipment and experience
        'knowledge_of_the_zone',
        'experience_with_activity',
        'bring_water',
        'bring_food',
        'bring_medication',
        'bring_flashlight',
        'bring_cold_clothes',
        'bring_waterproof_clothes',

        // contact person
        'name_contact_person',
        'phone_number_contact_person',
        'affinity_contact_person',

        // information to close the search
        'work_groups_used',
        'derivation_emergency_service',
        'emergency_service_receiver_id',
        'first_command',
        'intermediate_commands',
        'last_command',
        'tipology',
        'resources',
        'date_localization',
        'place_name_localization',
        'location_localization',
        'municipality_term_localization',
        'distance_from_last_place_seen_to_location',
        'who_does_the_localization',
        'physical_condition_people_when_find',
        'reason_finalization',

        // catalonia firefighters system coordinates
        'coe_cut_localization',
        'soc_localization',
        'section_localization',
        'utm_x_localization',
        'utm_y_localization',
    ];

    public function user_creation()
    {
        return $this->belongsTo('App\User', 'id_user_creation', 'id');
    }

    public function user_last_modification()
    {
        return $this->belongsTo('App\User', 'id_user_last_modification', 'id');
    }

    public function user_finalization()
    {
        return $this->belongsTo('App\User', 'id_user_finalization', 'id');
    }

    public function lost_people()
    {
        return $this->hasMany('App\LostPerson', 'id_search', 'id');
    }

    public function incidents()
    {
        return $this->hasMany('App\Incident', 'id_search', 'id');
    }
}
