import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PersonalRepresentativePowerComponent } from './personal-representative-power.component';

describe('PersonalRepresentativePowerComponent', () => {
  let component: PersonalRepresentativePowerComponent;
  let fixture: ComponentFixture<PersonalRepresentativePowerComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PersonalRepresentativePowerComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PersonalRepresentativePowerComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
