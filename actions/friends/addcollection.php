<?php
/**
 * Elgg collection add page
 *
 * @package Elgg.Core
 * @subpackage Friends.Collections
 */

//must be logged in
gatekeeper();

$collection_name = get_input('collection_name');
$friends = get_input('friends_collection');

//first check to make sure that a collection name has been set and create the new colection
if ($collection_name) {

	//create the collection
	$create_collection = create_access_collection($collection_name, get_loggedin_userid());

	//if the collection was created and the user passed some friends from the form, add them
	if ($create_collection && (!empty($friends))) {
		//add friends to the collection
		foreach ($friends as $friend) {
			add_user_to_access_collection($friend, $create_collection);
		}
	}

	// Success message
	system_message(elgg_echo("friends:collectionadded"));
	// Forward to the collections page
	forward("pg/collections/" . get_loggedin_user()->username);

} else {
	register_error(elgg_echo("friends:nocollectionname"));

	// Forward to the add collection page
	forward("pg/collections/add");
}
