class CreateUsers < ActiveRecord::Migration
  def change
    create_table :users do |t|
      t.string :name
      t.string :dojo_location
      t.string :favorite_language
      t.text :comment

      t.timestamps
    end
  end
end
