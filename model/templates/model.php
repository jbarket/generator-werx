<?php
<% if (root_namespace) { %>
namespace <%= root_namespace %>\Models;
<% } %>
use Illuminate\Database\Eloquent\Model;

/**
 * Class <%= name %>
 *
 * @property string $column1
 *
 * @codeCoverageIgnore
 */
class <%= name %> extends Model
{
    // white list fillable attributes
    protected $fillable = [];

    public $timestamps = false;
}